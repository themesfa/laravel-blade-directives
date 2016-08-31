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
use Jenssegers\Blade\Blade;

class BladeDirectivesTest extends \PHPUnit_Framework_TestCase
{
	private $blade;

	public function setUp()
    {
        $this->blade = new Blade('tests/views', 'tests/cache');

        $directives = [];

        AssignmentDirectives::register($this->blade, $directives);
    }

    public function testRenderAlias()
    {
        $output = $this->blade->render('basic');
        $this->assertEquals('hello world', trim($output));
    }

    /**
     * Html Writer on sample_output folder
     *
     * @param string $output The HTML output
     * @param string $blade_name The blade file name/path
     *
     * @return void
     */
    private function write($output, $blade_name)
    {
        $file_path = __DIR__.'/sample_output/'.$blade_name.'.html';
        file_put_contents($file_path, $output);
    }
    /**
     * HTML Reader on sample_output folder
     *
     * @param string $blade_name The blade file name/path
     *
     * @return string
     */
    private function read($blade_name)
    {
        $file_path = __DIR__.'/sample_output/'.$blade_name.'.html';
        return file_get_contents($file_path);
    }

	/**
     * Determine if the given path is a file.
     *
     * @param  string  $file
     * @return bool
     */
    private function isFile($file)
    {
    	return is_file($file);
    }

     /**
     * Get the returned value of a file.
     *
     * @param  string  $path
     * @return mixed
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function getRequire($path)
    {
        if ($this->isFile($path)) {
        	return require $path;
        }

        throw new FileNotFoundException("File does not exist at path {$path}");
    }
}