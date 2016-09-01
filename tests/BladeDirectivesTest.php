<?php

/**
 * This file is part of the Laravel Blade Directives library.
 *
 * @author     Wilson Pinto <wilsonpinto360@gmail.com>
 * @copyright  2016
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

namespace Wilsonpinto\Blade\Tests;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Wilsonpinto\Blade\Directives\AssignmentDirectives;
use Wilsonpinto\Blade\Directives\IteratorDirectives;
use Jenssegers\Blade\Blade;

class BladeDirectivesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Blade Template Engine
     *
     * @access private
     * @var \Jenssegers\Blade\Blade
     */
	private $blade;

    /**
     * Cache folder path
     *
     * @access private
     * @var string
     */
    private $cachePath = 'tests/cache';

    /**
     * Views folder path
     *
     * @access private
     * @var string
     */
    private $viewsPath = 'tests/views';

	public function setUp()
    {
        $this->blade = new Blade($this->viewsPath, $this->cachePath);
        
        $bladeCompiler = $this->blade->getEngineResolver()->resolve('blade')->getCompiler();

        $directives = require('__DIR__'.'/../src/directives.php');

        AssignmentDirectives::register($bladeCompiler, $directives);
    }

    public function tearDown()
    {
        $this->clearCache($this->cachePath);
    }
    
    /**
     * Test set directive
     *
     * @access  public
     * @return  void
     */
    public function testSetDirective()
    {
        $blade_template = 'setDirective';

        $output = $this->blade->render($blade_template);
        
        $this->assertEquals(
            $this->minify($output),
            $this->minify($this->read($blade_template))
        );
    }
    

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */ 
   
    /**
     * Html Writer on output folder
     *
     * @param string $output The HTML output
     * @param string $file The blade file name/path
     *
     * @return void
     */
    private function write($output, $file)
    {
        $file_path = __DIR__.'/output/'.$file.'.html';

        file_put_contents($file_path, $output);
    }

    /**
     * HTML Reader on output folder
     *
     * @param string $file The blade file name/path
     *
     * @return string
     */
    private function read($file)
    {
        $file_path = __DIR__.'/output/'.$file.'.html';

        return file_get_contents($file_path);
    }

    /**
     * Minify HTML output
     * 
     * @param  string $html
     * 
     * @return string
     */
    private function minify($html)
    {
        $search = [ '/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s' ];

        $replace = [ '>', '<', '\\1'];

        if (preg_match("/\<html/i",$html) == 1 && preg_match("/\<\/html\>/i",$html) == 1) {
            $html = preg_replace($search, $replace, $html);
        }

        return $html;
    }

    /**
     * Clear cached views
     * 
     * @param  string $cachePath The cache path
     * 
     * @return void
     */
    private function clearCache($cachePath)
    {
        $fileToDelete = glob($cachePath.'/*');

        foreach($fileToDelete as $file){ 
            if(is_file($file)){
                unlink($file);
            }
        }
    }
}