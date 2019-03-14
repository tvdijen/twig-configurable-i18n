<?php
/**
 * A class implementing a token parser for translation nodes.
 *
 * @author Jaime Pérez Crespo
 */
namespace JaimePerez\TwigConfigurableI18n\Twig\Extensions\TokenParser;

use JaimePerez\TwigConfigurableI18n\Twig\Extensions\Node\Trans as NodeTrans;
use Twig\Token;
use Twig\Extensions\TokenParser\Trans;

class Trans extends \Twig\Extensions\TokenParser\Trans
{
    /**
     * Parses a token and returns a node.
     *
     * @param Twig_Token $token A Twig_Token instance
     *
     * @return NodeTrans A \Twig\Node instance
     */
    public function parse(\Twig\Token $token)
    {
        $parsed = parent::parse($token);
        $body = ($parsed->hasNode('body')) ? $parsed->getNode('body') : null;
        $plural = ($parsed->hasNode('plural')) ? $parsed->getNode('plural') : null;
        $count = ($parsed->hasNode('count')) ? $parsed->getNode('count') : null;
        $notes = ($parsed->hasNode('notes')) ? $parsed->getNode('notes') : null;
        return new NodeTrans($body, $plural, $count, $notes, $parsed->getTemplateLine(), $parsed->getNodeTag());
    }
}
