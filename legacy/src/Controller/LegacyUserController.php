<?php

declare(strict_types=1);

namespace Legacy\Controller;

use App\UI\Controller\User\ShowAction;
use Legacy\LegacyRequest;

final class LegacyUserController
{
    public function __construct(
        private ShowAction $showAction
    ) {

    }

    public function show(int $id)
    {
        $response = $this->showAction->__invoke(
            new LegacyRequest()
        );
    }

    public function index()
    {
        die('index');
    }

    public function delete()
    {
        die('delete');
    }
}
