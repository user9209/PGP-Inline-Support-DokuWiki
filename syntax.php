<?php
/**
 * PGP-Inline-Support Plugin
 *
 * @license    GPL 3 (http://www.gnu.org/licenses/gpl.html)
 * @author     Georg Schmidt
 */

// https://www.dokuwiki.org/devel:syntax_plugins
class syntax_plugin_pgpinlinesupport extends DokuWiki_Syntax_Plugin
{
    
    // Kind of syntax
    function getType()
    {
        return 'substition';
    }
    
    // Paragraph type
    function getPType()
    {
        return 'block';
    }
    
    // sorting order
    function getSort()
    {
        return 2;
    }
    
    function connectTo($mode)
    {
        $this->Lexer->addSpecialPattern('-----BEGIN PGP MESSAGE-----[^-]+-----END PGP MESSAGE-----', $mode, 'plugin_pgpinlinesupport');
        $this->Lexer->addSpecialPattern('-----BEGIN PGP SIGNED MESSAGE-----[^-]+-----END PGP SIGNATURE-----', $mode, 'plugin_pgpinlinesupport');
    }
    
    // Trim Match
    function handle($match, $state, $pos, Doku_Handler $handler)
    {
        return $match;
    }
    
    // Render output
    public function render($mode, Doku_Renderer $renderer, $data)
    {
        
        if ($mode == 'xhtml')
        {
            $renderer->doc .= '<pre>' . $data . '</pre>';
            return true;
        }
        return false;
    }
}

//Setup VIM: ex: et ts=4 enc=utf-8 :
