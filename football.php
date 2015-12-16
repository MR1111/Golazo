<!DOCTYPE html>
<html>
<head>
    <title>Football data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style>
        #page img {
            width: 30%;
            height: auto;
        }

    </style>
    <?php

    require 'Slim/Slim.php';
    \Slim\Slim::registerAutoloader();
    $app = new \Slim\Slim();

    header('Content-type:text/html;charset=utf-8');
    $appkey = "9691d9b8e92d7413b900ddff5d69322f";
    $map = array(
        '拜仁慕尼黑' => 'FC Bayern Munich',
        '沃尔夫斯堡' => 'VfL Wolfsburg',
        '门兴' => 'Borussia Mönchengladbach',
        '勒沃库森' => 'Bayer 04 Leverkusen',
        '奥格斯堡' => 'FC Augsburg',
        '沙尔克04' => 'FC Schalke 04',
        '多特蒙德' => 'Borussia Dortmund',
        '霍芬海姆' => 'TSG 1899 Hoffenheim',
        '法兰克福' => 'Eintracht Frankfurt',
        '不莱梅' => 'SV Werder Bremen',
        '美因茨' => 'FSV Mainz 05',
        '科隆' => 'FC Köln',
        '汉诺威' => 'Hannover 96',
        '斯图加特' => 'VfB Stuttgart',
        '柏林赫塔' => 'Hertha BSC',
        '汉堡' => 'Hamburger SV',
        '因戈尔施塔特' => 'FC Ingolstadt 04',
        '达姆施塔特' => 'SV Darmstadt 98',
        '德甲' => 'Bundesliga',
        '欧联杯' => 'Europa League',
        '帕奥克' => 'PAOK',
    );
    //************1.足球联赛赛事查询************
    $url = "http://op.juhe.cn/onebox/football/league";
    $params = array(
        "key" => $appkey,//应用APPKEY(应用详细页查询)
        "dtype" => "json",//返回数据的格式,xml或json，默认json
        "league" => "德甲",//联赛名称
    );
    $paramstring = http_build_query($params);
    $content = juhecurl($url, $paramstring);
    $result = json_decode($content, true);
    $app->get('/team/:teamName/', function ($teamName) {
        $url = "http://op.juhe.cn/onebox/football/team";
        $params = array(
            "key" => "9691d9b8e92d7413b900ddff5d69322f",//应用APPKEY(应用详细页查询)
            "dtype" => "json",//返回数据的格式,xml或json，默认json
            "team" => $teamName,//球队名称
        );
        $paramstring = http_build_query($params);
        $content = juhecurl($url, $paramstring);
        $result = json_decode($content, true);
    });
    ?>
</head>
<body>
<div id="pageone" data-role="page">
    <div data-role="header" style="text-align: center; background-color: #00ae00; color: white;">
        <p>Home</p>
    </div>
    <div data-role="content">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/15/Bundesliga_logo.svg/1161px-Bundesliga_logo.svg.png" style="width: 60%; height: auto; margin: 0 25%;">
        <div data-role="navbar" class="ui-navbar ui-mini" role="navigation">
            <a data-transition="flip" class="ui-btn ui-icon-star ui-btn-icon-left"" href="#panel">History</a>
            <a href="#page" class="ui-btn ui-icon-search ui-btn-icon-left">Team</a>
            <a href="#pagethree" class="ui-btn ui-icon-bullets ui-btn-icon-left">League</a>
        </div>
    </div>

    <div data-role="panel" id="panel">
        <h2>History</h2>

        <p><a href="#" data-rel="close">Should be Searching history here</a></p>

        <p><a href="#" data-rel="close">However</a></p>

        <p><a href="#" data-rel="close">Failed to do it</a></p>

        <p><a href="#" data-rel="close">Sorry</a></p>
        <a data-rel="close">Close</a>
    </div>
</div>

<div data-role="page" id="team">
    <div data-role="header" style="text-align: center; background-color: #00ae00; color: white; position: fixed; width:100%;">
        <a href="#page" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-notext">back</a>
        <h1>Score</h1>
    </div>
    <div data-role="content" style="padding-top: 15%;">
        <h2 id="team-name" style="text-align: center; color:#00ae00; border: 1px dashed #00ae00;"></h2>
        <b id="game1"></b>
        <br>
        <b id="date1"></b>
        <br>
        <b id="time1"></b>
        <br>
        <b id="home1"></b>
        <b id="score1"></b>
        <b id="away1"></b>
        <br>
        <br>
        <b id="game2"></b>
        <br>
        <b id="date2"></b>
        <br>
        <b id="time2"></b>
        <br>
        <b id="home2"></b>
        <b id="score2"></b>
        <b id="away2"></b>
        <br>
        <br>
        <b id="game3"></b>
        <br>
        <b id="date3"></b>
        <br>
        <b id="time3"></b>
        <br>
        <b id="home3"></b>
        <b id="score3"></b>
        <b id="away3"></b>
        <br>
        <br>
        <b id="game4"></b>
        <br>
        <b id="date4"></b>
        <br>
        <b id="time4"></b>
        <br>
        <b id="home4"></b>
        <b id="score4"></b>
        <b id="away4"></b>
        <br>
        <br>
        <b id="game5"></b>
        <br>
        <b id="date5"></b>
        <br>
        <b id="time5"></b>
        <br>
        <b id="home5"></b>
        <b id="score5"></b>
        <b id="away5"></b>

    </div>
</div>

<script type="application/javascript">
    /**
     * Translation map.
     */
    var translationMap = {
        '拜仁慕尼黑': 'FC Bayern Munich',
        '沃尔夫斯堡': 'VfL Wolfsburg',
        '门兴': 'Borussia Mönchengladbach',
        '勒沃库森': 'Bayer 04 Leverkusen',
        '奥格斯堡': 'FC Augsburg',
        '沙尔克04': 'FC Schalke 04',
        '多特蒙德': 'Borussia Dortmund',
        '霍芬海姆': 'TSG 1899 Hoffenheim',
        '法兰克福': 'Eintracht Frankfurt',
        '不来梅': 'SV Werder Bremen',
        '美因茨': 'FSV Mainz 05',
        '科隆': 'FC Köln',
        '汉诺威96': 'Hannover 96',
        '斯图加特': 'VfB Stuttgart',
        '柏林赫塔': 'Hertha BSC',
        '汉堡': 'Hamburger SV',
        '因戈尔施塔特': 'FC Ingolstadt 04',
        '达姆施塔特': 'SV Darmstadt 98',
        '德甲': 'Bundesliga',
        '欧联杯': 'Europa League',
        '帕奥克': 'PAOK',
        '欧冠':'Champions League',
        '曼联':'Manchester United'
    };

    /**
     * Find a team.
     * @param {String} teamName Team name.
     */
    function findTeam(teamName) {
        $.ajax("http://op.juhe.cn/onebox/football/team", {
            method: 'GET',
            dataType: 'jsonp',
            data: {
                'key': '9691d9b8e92d7413b900ddff5d69322f',
                'dtype': 'json',
                'team': teamName
            }
        }).success(function (data) {
            console.log(data);
            $('#team-name').text(translationMap[data['result']['key']]);
            $('#game1').text(translationMap[data['result']['list']['0']['c1']]);
            $('#date1').text(data['result']['list']['0']['c2']);
            $('#time1').text(data['result']['list']['0']['c3']);
            $('#home1').text(translationMap[data['result']['list']['0']['c4T1']]);
            $('#score1').text(data['result']['list']['0']['c4R']);
            $('#away1').text(translationMap[data['result']['list']['0']['c4T2']]);
            $('#game2').text(translationMap[data['result']['list']['1']['c1']]);
            $('#date2').text(data['result']['list']['1']['c2']);
            $('#time2').text(data['result']['list']['1']['c3']);
            $('#home2').text(translationMap[data['result']['list']['1']['c4T1']]);
            $('#score2').text(data['result']['list']['1']['c4R']);
            $('#away2').text(translationMap[data['result']['list']['1']['c4T2']]);
            $('#game3').text(translationMap[data['result']['list']['2']['c1']]);
            $('#date3').text(data['result']['list']['2']['c2']);
            $('#time3').text(data['result']['list']['2']['c3']);
            $('#home3').text(translationMap[data['result']['list']['2']['c4T1']]);
            $('#score3').text(data['result']['list']['2']['c4R']);
            $('#away3').text(translationMap[data['result']['list']['2']['c4T2']]);
            $('#game4').text(translationMap[data['result']['list']['3']['c1']]);
            $('#date4').text(data['result']['list']['3']['c2']);
            $('#time4').text(data['result']['list']['3']['c3']);
            $('#home4').text(translationMap[data['result']['list']['3']['c4T1']]);
            $('#score4').text(data['result']['list']['3']['c4R']);
            $('#away4').text(translationMap[data['result']['list']['3']['c4T2']]);
            $('#game5').text(translationMap[data['result']['list']['4']['c1']]);
            $('#date5').text(data['result']['list']['4']['c2']);
            $('#time5').text(data['result']['list']['4']['c3']);
            $('#home5').text(translationMap[data['result']['list']['4']['c4T1']]);
            $('#score5').text(data['result']['list']['4']['c4R']);
            $('#away5').text(translationMap[data['result']['list']['4']['c4T2']]);
        });
        location.href = '#team';
    }
</script>

<div data-role="page" id="pagethree">
    <div data-role="header" style="text-align: center; background-color: #00ae00; color: white;">
        <a href="#pageone" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-notext">back</a>
        <h1>In the Liga</h1>
    </div>
    <div data-role="content">
        <?php
        if ($result) {
            if ($result['error_code'] == '0') {
                echo '<b>' . $map[$result['result']['key']] . '</b>';
                echo '<br>';
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][0]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][0]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][0]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][0]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][0]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][0]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][0]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][1]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][1]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][1]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][1]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][1]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][1]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][1]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][2]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][2]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][2]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][2]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][2]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][2]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][2]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][3]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][3]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][3]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][3]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][3]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][3]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][3]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][4]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][4]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][4]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][4]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][4]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][4]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][4]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][5]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][5]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][5]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][5]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][5]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][5]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][5]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][6]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][6]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][6]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][6]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][6]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][6]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][6]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][7]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][7]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][7]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][7]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][7]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][7]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][7]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][8]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][8]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][8]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][8]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][8]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][8]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][8]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][9]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][9]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][9]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][9]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][9]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][9]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][9]['c6'] . '</b>';//积分
                echo '<br>';
                echo '<b>' . $map[$result['result']['views']['jifenbang'][10]['c2']] . '</b>';//球队
                echo '&nbsp;'; echo '<br>';
                echo '<b>' . $result['result']['views']['jifenbang'][10]['c3'] . '</b>';//赛数
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][10]['c41'] . '</b>';//胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][10]['c42'] . '</b>';//平
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][10]['c43'] . '</b>';//负
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][10]['c5'] . '</b>';//净胜
                echo '&nbsp;';
                echo '<b>' . $result['result']['views']['jifenbang'][10]['c6'] . '</b>';//积分

            } else {
                echo $result['error_code'] . ":" . $result['reason'];
            }
        } else {
            echo "Failed to load";
        }
        ?>

    </div>
</div>
<div data-role="page" id="page">
    <div data-role="header" style="text-align: center; background-color: #00ae00; color: white;">
        <a href="#pageone" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-notext">back</a>
        <h1>Chose a Team</h1>
    </div>
    <div data-role="content">
        <img src="images/team_01.gif" onclick="findTeam('达姆施塔特/')">
        <img src="images/team_02.gif" onclick="findTeam('多特蒙德');">
        <img src="images/team_03.gif" onclick="findTeam('门兴/')">
        <img src="images/team_04.gif" onclick="findTeam('不来梅/')">
        <img src="images/team_05.gif" onclick="findTeam('拜仁慕尼黑/')">
        <img src="images/team_06.gif" onclick="findTeam('沙尔克04/')">
        <img src="images/team_07.gif" onclick="findTeam('柏林赫塔/')">
        <img src="images/team_08.gif" onclick="findTeam('美因茨/')">
        <img src="images/team_09.gif" onclick="findTeam('汉堡/')">
        <img src="images/team_10.gif" onclick="findTeam('因戈尔施塔特/')">
        <img src="images/team_11.gif" onclick="findTeam('汉诺威96/')">
        <img src="images/team_12.gif" onclick="findTeam('斯图加特/')">
        <img src="images/team_13.gif" onclick="findTeam('奥格斯堡/')">
        <img src="images/team_14.gif" onclick="findTeam('勒沃库森/')">
        <img src="images/team_15.gif" onclick="findTeam('法兰克福/')">
        <img src="images/team_16.gif" onclick="findTeam('沃尔夫斯堡/')">
        <img src="images/team_17.gif" onclick="findTeam('科隆/')">
        <img src="images/team_18.gif" onclick="findTeam('霍芬海姆/')">
    </div>
</div>
<?php
//************2.球队赛事查询************

//**************************************************

function juhecurl($url, $params = false, $ispost = 0)
{
    $httpInfo = array();
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    if ($ispost) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_URL, $url);
    } else {
        if ($params) {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }
    $response = curl_exec($ch);
    if ($response === FALSE) {
        return false;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
    curl_close($ch);
    return $response;
}

?>

</body>
