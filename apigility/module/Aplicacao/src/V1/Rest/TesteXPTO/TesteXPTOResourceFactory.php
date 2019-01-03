<?php
namespace Aplicacao\V1\Rest\TesteXPTO;

class TesteXPTOResourceFactory
{
    public function __invoke($services)
    {
        return new TesteXPTOResource();
    }
}
