/**
 * This file is part of Moodle.
 *
 * Moodle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Moodle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Moodle.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * exambrowser.js
 *
 * @package   theme_uhh
 * @author    Lars Thoms <lars.thoms@uni-hamburg.de>
 * @copyright 2020 Universität Hamburg
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// BatteryManager
let battery;

/**
 * Create Widget including inline styles
 */
function exambrowserCreateWidget() {
    let widget = document.createElement('div');
    widget.id = 'exambrowser';
    widget.innerHTML = `<style>
    #exambrowser
    {
        position: fixed;
        bottom: 1rem;
        right: 1rem;
        z-index: 999999999;
        background: #3b515c;
        padding: 1.3rem 1rem 1rem 1rem;
        color: #ffffff;
        transition: opacity .1s linear;
    }

    #exambrowser:hover
    {
        opacity: 0.1;
    }

    #exambrowser-time
    {
        font-size: 2rem;
        line-height: 0;
    }

    #exambrowser-battery
    {
        position: relative;
        display: block;
        margin-top: .3rem;
        padding: .2rem;
        background: #ffffff;
        text-shadow: 1px 1px #000000;
        text-align: center;
        border: 1px solid #ffffff;
    }

    #exambrowser-battery:after
    {
        content: "";
        position: absolute;
        top: calc(50% - 6px);
        right: -5px;
        width: 4px;
        height: 12px;
        background: #ffffff;
    }
    </style>`;
    widget.innerHTML += '<time id="exambrowser-time">00:00</time>&nbsp;Uhr<br><span id="exambrowser-battery">0h 0min</span>';
    document.body.appendChild(widget);
}

/**
 * Set eventhandler of battery
 */
function exambrowserInitBattery(batteryManager) {
    battery = batteryManager;
    exambrowserUpdateBattery();
    battery.addEventListener('chargingchange', exambrowserUpdateBattery);
    battery.addEventListener('chargingtimechange', exambrowserUpdateBattery);
    battery.addEventListener('dischargingtimechange', exambrowserUpdateBattery);
    battery.addEventListener('levelchange', exambrowserUpdateBattery);
}

/**
 * Update battery stats in widget
 */
function exambrowserUpdateBattery() {
    let element = document.getElementById('exambrowser-battery');
    element.style.background = 'linear-gradient(90deg, rgba(76, 175, 80, 1) 0%, rgba(76, 175, 80, 1) ' + (battery.level * 100) + '%, rgba(255, 255, 255, 1) ' + (battery.level * 100) + '%, rgba(255, 255, 255, 1) 100%)';
    element.innerHTML = exambrowserFormatBattery(battery.dischargingTime);
}

/**
 * Update time in widget
 */
function exambrowserUpdateTime() {
    let self = this;
    let now = new Date();
    document.getElementById('exambrowser-time').innerHTML = exambrowserFormatTime(now.getHours()) + ':' + exambrowserFormatTime(now.getMinutes());
    setTimeout(exambrowserUpdateTime, 60000);
}

/**
 * Helper function to align time with leading zeros
 */
function exambrowserFormatTime(i) {
    if (i < 10) {
        i = '0' + i
    }
    return i;
}

/**
 * Helper function to build a string containing battery stats
 */
function exambrowserFormatBattery(duration) {
    if (!isFinite(duration)) {
        return '<span class="fa fa-plug"></span>';
    } else {
        let hours = Math.floor(duration / 3600);
        let seconds = duration % 60;
        let minutes = Math.floor((duration - hours * 3600 - seconds) / 60);
        return hours + 'h ' + minutes + 'min';
    }
}

// Check if "the right" browser is used
if (navigator.userAgent == "exambrowser") {
    // Widget
    exambrowserCreateWidget();
    exambrowserUpdateTime();
    navigator.getBattery().then(exambrowserInitBattery, null);

    // Hide navigation to reduce confusion during exams
    let navigationDrawer = document.querySelector('body.drawer-open-right .nav-link[data-action=toggle-drawer]');
    if (navigationDrawer) {
        navigationDrawer.click();
    }
}
