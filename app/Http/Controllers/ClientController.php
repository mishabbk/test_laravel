<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientManageRequest;
use App\Repository\ClientRepositoryInterface;
use App\Repository\Filters\ClientSearchFilter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * @var ClientRepositoryInterface
     */
    private $clientRepository;

    /**
     * ClientController constructor.
     *
     * @param ClientRepositoryInterface $clientRepository
     */
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param Request $request
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $clients    = [];
        $sourceData = 'Cache';

        $search = $request->input('search');
        if (!empty($search)) {
            $clients = Cache::remember(
                'clients.search:' . $search,
                now()->addMinutes(10),
                function () use ($search, &$sourceData) {
                    $sourceData = 'Database';
                    return $this->clientRepository->search(
                        (new ClientSearchFilter())
                            ->setSearch($search)
                    );
                }
            );
        }

        return view(
            'client.index',
            [
                'search'     => $search,
                'clients'    => $clients,
                'sourceData' => $sourceData
            ]
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('client.create');
    }

    /**
     * @param ClientManageRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ClientManageRequest $request): RedirectResponse
    {
        return $this->manage(
            $request,
            new Client()
        );
    }

    /**
     * @param  Client  $client
     *
     * @return View
     */
    public function edit(Client $client): View
    {
        return view(
            'client.edit',
            [
                'client' => $client
            ]
        );
    }

    /**
     * @param  ClientManageRequest  $request
     * @param  Client  $client
     *
     * @return RedirectResponse
     */
    public function update(ClientManageRequest $request, Client $client): RedirectResponse
    {
        return $this->manage($request, $client);
    }

    /**
     * @param ClientManageRequest $request
     * @param Client $client
     *
     * @return RedirectResponse
     */
    private function manage(ClientManageRequest $request, Client $client): RedirectResponse
    {
        $client->fill($request->all());
        $client->save();

        return redirect()->route('index');
    }
}
