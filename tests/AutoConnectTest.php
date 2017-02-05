<?php
/*
    This file is part of Erebot.

    Erebot is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Erebot is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Erebot.  If not, see <http://www.gnu.org/licenses/>.
*/

class   AutoConnectTest
extends Erebot_Testenv_Module_TestCase
{
    public function setUp()
    {
        $this->module = new \Erebot\Module\AutoConnect(null);
        parent::setUp();
        $this->_connection
            ->expects($this->any())
            ->method('getModule')
            ->will($this->returnValue($this));
        $this->module->reloadModule($this->_connection, 0);
    }

    public function realRegisterHelpMethod($module, $callback)
    {
        // Nothing to do here.
    }

    /* Testing this module is quite meaningless for the time being
     * because it's pretty much empty. Therefore, we only check
     * whether we can actually load/unload the module, nothing more. */
    public function testAutoConnect()
    {
        $this->module->reloadModule(
            $this->_connection,
            \Erebot\Module\Base::RELOAD_ALL |
            \Erebot\Module\Base::RELOAD_INIT
        );
        $this->module->unloadModule();
    }
}

