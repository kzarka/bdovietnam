$(document).ready(function() {
    "use strict";

    var next_boss = getNextBoss();
    var bossIndex = 1;
    init();

    function init() {
        printBossName();
        countDown();
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
        $('#boss_timer').html(next_boss[1]);
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