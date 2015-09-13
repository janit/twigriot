<?php

namespace Janit\Twig;

use Symfony\Component\Process\Process;

class RiotRendererExtension extends \Twig_Extension
{

    public function getName() {
        return "riot_render";
    }

    public function getFunctions() {
        return array(
            'riot_render' => new \Twig_Function_Method($this, 'riotRenderer',
				array('is_safe' => array('html'))
            )
        );
    }

    public static function riotRenderer($tagName,$coords) {

    	$buffer = '<!-- begin riot: ' . $tagName . ' -->' . PHP_EOL;

    	$tagFile = '../web/js/tags/' . $tagName . '.tag';
    	$processCommand = 'node ../renderer/app.js ' . $tagFile . ' ' . $coords[0] . ' ' . $coords[1];

		$process = new Process($processCommand);

		$process->run();

		if (!$process->isSuccessful()) {
		    throw new \RuntimeException($process->getErrorOutput());
		}

		$buffer .= $process->getOutput();

		$process = new Process('riot ' . $tagFile);
		$process->run();

		if (!$process->isSuccessful()) {
		    throw new \RuntimeException($process->getErrorOutput());
		}

		$scriptFile = trim(explode('>',$process->getOutput())[1]);

		$buffer .= '<script src="/' . $scriptFile .'"></script>';

    	$buffer .= PHP_EOL . '<!-- end riot -->';

		return $buffer;

    }
}