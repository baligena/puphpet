<?php

namespace PuphpetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VagrantfileDigitalOceanController extends Controller
{
    public function indexAction(array $data)
    {
        return $this->render('PuphpetBundle:vagrantfile-digitalocean:form.html.twig', [
            'data' => $data,
        ]);
    }

    public function machineAction()
    {
        return $this->render('PuphpetBundle:vagrantfile-digitalocean/sections:machine.html.twig', [
            'machine' => $this->getData()['empty_machine'],
            'regions' => $this->getData()['regions'],
            'sizes'   => $this->getData()['sizes'],
        ]);
    }

    public function syncedFolderAction()
    {
        return $this->render('PuphpetBundle:vagrantfile-digitalocean/sections:synced-folder.html.twig', [
            'synced_folder' => $this->getData()['empty_synced_folder'],
        ]);
    }

    /**
     * @return array
     */
    private function getData()
    {
        $manager = $this->get('puphpet.extension.manager');
        return $manager->getExtensionAvailableData('vagrantfile-digitalocean');
    }
}
