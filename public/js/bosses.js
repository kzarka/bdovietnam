$(document).ready(function() {
    "use strict";

    var next_boss = getNextBoss();
    var bossIndex = 1;
    var timestampNextBoss = 0;
    init();

    function init() {
        nextBossTimeStamp();
        printBossName();
        countDown();
    }

    function nextBossTimeStamp() {
        let timeNow = next_boss[1].split(':');
        var d = new Date();
        let currentDay = next_boss[2];
        if(d.getDay() < currentDay) {
            d.setDate(d.getDate() +1);
        }
        d.setHours(timeNow[0]);
        d.setMinutes(timeNow[1]);
        d.setSeconds(0);
        timestampNextBoss = d.getTime();
    }

    function printBossName () {
        $('#boss_name').html(next_boss[0] + ': ' +next_boss[1]);
        let bossList = next_boss[0].split('|');
        if(bossList.length == 1) {
            let name = bossList[0].toLowerCase();
            $('.box .content').css('background-image', 'url(/images/bosses/'+ name + '.png)');
            return;
        }
        let name = bossList[0].toLowerCase();
        $('.box .content').css('background-image', 'url(/images/bosses/'+ name + '.png)');
        loopBossImages();
    }

    function loopBossImages(){
        let bossList = next_boss[0].split('|');
        if(bossIndex > 1) bossIndex = 0;
        let name = bossList[bossIndex].toLowerCase();
        $('.box .content').css('background-image', 'url(/images/bosses/'+ name + '.png)');
        bossIndex++;
        if (bossList.length > 1) {
            setTimeout(loopBossImages, 2000);
        } 
    }

    function countDown () {
        let displayTimer = '';
        let secondToBoss = Math.ceil((timestampNextBoss - Date.now())/1000);
        console.log(secondToBoss);
        let minToBoss = Math.ceil(secondToBoss/60);
        let hourToBoss = Math.floor(minToBoss/60);
        let remainMinutes = minToBoss%60;
        let remainSeconds = secondToBoss%60;
        if (remainMinutes < 10) {
            remainMinutes = '0' + remainMinutes;
        }
        if (remainSeconds < 10) {
            remainSeconds = '0' + remainSeconds;
        }

        displayTimer = hourToBoss + ':' + remainMinutes + ':' + remainSeconds;
        $('#boss_timer').html(displayTimer);
        setTimeout(countDown, 1000);
    }



    /* Get next boss 
     * @return {array}
     */
    function getNextBoss(){
        let loop_count = 0;
        var now = new Date();
        var n = now.getDay();
        var time = ["0:30", "6:00", "10:00", "14:00", "19:00", "23:00"];
        var current = 0;
        var hour = time[current];
        if(now>hourToDay('23:00')) {
            let i = 0;
            let m = n;
            if(m== 6) {
                m = 0;
            }
            else m+= 1;
            while(!(bosses_table[m][hour])) {
                current = i++;
            }
            hour = time[current];
            
            let name = bosses_table[m][hour];
            return [name, hour, m];
        }
        for(let i=0; i<time.length-1; i++) {
            if(now>hourToDay(time[i]) && now<hourToDay(time[i+1])) {
                current = i+1;
            }
        }
        hour = time[current];
        while(!(bosses_table[n][hour])) {
            loop_count++;
            if(loop_count > 42) return null;
            console.log(n + ' ' + hour);
            if(current>time.length-1) {
                current = 0;
                if(n == 6) {
                    n = 0;
                }
                else n+= 1;
            }
            hour = time[current++];

        }
        let name = bosses_table[n][hour];
        return [name, hour, n];
    }

    /* Convert hour to day 
     * @param hour {string} hh:mm
     * @return Day
     */
    function hourToDay(hour){
        var day = new Date();
        let h = parseInt(hour.split(':')[0]);
        let m = parseInt(hour.split(':')[1]);
        day.setHours(h);
        day.setMinutes(m);
        return day;
    }

});