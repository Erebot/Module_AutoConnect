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

namespace Erebot\Module;

/**
 * \brief
 *      A module which, when enabled on a particular IRC network
 *      will make the bot try to automatically connect to that
 *      network.
 *
 * This module is implicitly used by the Core (where its name is pretty
 * much hard-coded) and doesn't need to do anything special to work.
 */
class AutoConnect extends \Erebot\Module\Base implements \Erebot\Interfaces\HelpEnabled
{
    /**
     * This method is called whenever the module is (re)loaded.
     *
     * \param int $flags
     *      A bitwise OR of the Erebot_Module_Base::RELOAD_*
     *      constants. Your method should take proper actions
     *      depending on the value of those flags.
     *
     * \note
     *      See the documentation on individual RELOAD_*
     *      constants for a list of possible values.
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function reload($flags)
    {
    }

    /**
     * Provides help about this module.
     *
     * \param Erebot::Interfaces::Event::Base_TextMessage $event
     *      Some help request.
     *
     * \param Erebot::Interfaces::TextWrapper $words
     *      Parameters passed with the request. This is the same
     *      as this module's name when help is requested on the
     *      module itself (in opposition with help on a specific
     *      command provided by the module).
     */
    public function getHelp(
        \Erebot\Interfaces\Event\Base\TextMessage $event,
        \Erebot\Interfaces\TextWrapper $words
    ) {
        if ($event instanceof \Erebot\Interfaces\Event\Base\PrivateMessage) {
            $target = $event->getSource();
            $chan   = null;
        } else {
            $target = $chan = $event->getChan();
        }

        if (count($words) == 1 && $words[0] === get_called_class()) {
            $msg = $this->getFormatter($chan)->_(
                "This module does not provide any command, but ".
                "can be used in Erebot's configuration file to make ".
                "the bot automatically connect to a given server ".
                "at startup."
            );
            $this->sendMessage($target, $msg);
            return true;
        }
    }
}
