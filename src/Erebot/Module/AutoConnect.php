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

/**
 * A module which, when enabled on a particular IRC network
 * will make the bot try to automatically connect to that
 * network.
 *
 * This module is implicitly used by the Core (where its name
 * is hard-coded) and doesn't to do anything special to work.
 */
class   Erebot_Module_AutoConnect
extends Erebot_Module_Base
{
    public function reload($flags)
    {
    }
}

?>
