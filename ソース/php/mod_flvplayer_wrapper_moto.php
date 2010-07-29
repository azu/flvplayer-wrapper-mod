<?php
//165氏の発想をもとに、Opera9で動くことを前提としていろいろいじった。
//php5.2.3(cgi版)+なんかそれに付属してきたmingで動作確認
//オブジェクトとかクラスとか理解していない素人です

$useswfversion = 8;
$version = "mod " . date('Y-m-d H:i') . " swf" . $useswfversion;

ming_setscale(20.0);
ming_useswfversion($useswfversion);
mb_internal_encoding('UTF-8');$movie = new SWFMovie();

// 同じfpsにしないとなぜか@CMが早送りになる
// フレーム単位でカウントしてる部分とか遅くなるけどとりあえず放置
// nicoplayerは25fpsで統一されている
$movie->setRate(25);
$movie->setBackground(0xff,0xff,0xff);
$movie->setDimension(952,540-30);

function addImageToMovie($clip,$name,$img,$x,$y){
    $image = new SWFBitmap(fopen($img, "rb"));
    $sp = new SWFSprite();
    $sp->add($image);
    $sp->nextFrame();
    $a = $clip->add($sp);
    $a->setName($name);
    $a->moveTo($x,$y);
}

//function makeShapeWithImage($img){
    //引数 jpeg画像までの相対パス
    //イメージそのままボタンにできないらしいので、同サイズshapeに画像をいれる
//  $bmp = new SWFBitmap(fopen($img,"rb"));
//  $w = $bmp->getWidth();
//  $h = $bmp->getHeight();
//  $shape = new SWFShape();
//  $fill = $shape->addFill($bmp);
//  $shape->setRightFill($fill);
//  $shape->movePenTo(0,0);
//  $shape->drawLineTo($w,0);
//  $shape->drawLineTo($w,$h);
//  $shape->drawLineTo(0,$h);
//  $shape->drawLineTo(0,0);
//  return $shape;
//}

//function addButtonToMovie($clip,$name,$up_img,$over_img,$down_img,$hit_img,$script,$x,$y){
//  $up = makeShapeWithImage($up_img);
//  $over = makeShapeWithImage($over_img);
//  $down = makeShapeWithImage($down_img);
//  $hit = makeShapeWithImage($hit_img);
//  $button = new SWFButton();
//  $button->setUp($up);
//  $button->setOver($over);
//  $button->setDown($down);
//  $button->setHit($hit);
//  $button->setAction(new SWFAction($script));
//  $a = $clip->add($button);
//  $a->moveTo($x,$y);
//  $a->setName($name);
//}

//■■■■■■■■■■■■■■メインバー■■■■■■■■■■■■■■
$mb0_sp = new SWFSprite();
addImageToMovie($mb0_sp, "base", "../image/main_bar_l.jpg",0,0);
$mb0_sp->nextFrame();
$mb0_clip = $movie->add($mb0_sp);
$mb0_clip->setName("main_bar0");
$mb0_clip->moveTo(3,3);

//■■■■■■■■■■■■■■メインバー(小)■■■■■■■■■■■■■■
$mb1_sp = new SWFSprite();
addImageToMovie($mb1_sp, "base", "../image/main_bar_s.jpg",0,0);
$mb1_sp->nextFrame();
$mb1_clip = $movie->add($mb1_sp);
$mb1_clip->setName("main_bar1");
$mb1_clip->moveTo(556,55);

//■■■■■■■■■■■■■■NGIDメニュー■■■■■■■■■■■■■■
$nm_sp = new SWFSprite();
addImageToMovie($nm_sp, "base", "../image/ngid_menu.jpg",0,0);
$nm_sp->nextFrame();
$nm_clip=$movie->add($nm_sp);
$nm_clip->setName("ngid_menu");
$nm_clip->moveTo(552,85);

//■■■■■■■■■■■■■■kakikomiメニュー■■■■■■■■■■■■■■
$kk_sp = new SWFSprite();
addImageToMovie($kk_sp, "base", "../image/ngid_menu.jpg",0,0);
$kk_sp->nextFrame();
$kk_clip=$movie->add($kk_sp);
$kk_clip->setName("kakikomi_menu");
$kk_clip->moveTo(552,85);

//■■■■■■■■■■■■■■Thumbメニュー■■■■■■■■■■■■■■
$th_sp = new SWFSprite();
addImageToMovie($th_sp, "base", "../image/ngid_menu.jpg",0,0);
$th_sp->nextFrame();
$th_clip=$movie->add($th_sp);
$th_clip->setName("thumb_menu");
$th_clip->moveTo(552,100);

//■■■■■■■■■■■■■■設定メニュー■■■■■■■■■■■■■■
$pm_sp = new SWFSprite();
addImageToMovie($pm_sp, "base", "../image/pref_menu.jpg",0,0);

$pm_sp->nextFrame();
$pm_clip=$movie->add($pm_sp);
$pm_clip->setName("pref_menu");
$pm_clip->moveTo(561,75);

//■■■■■■■■■■■■■■スクリーン■■■■■■■■■■■■■■
$sc_sp = new SWFSprite();
$sc_sp->nextFrame();
$sc_clip=$movie->add($sc_sp);
$sc_clip->setName("screen");
$sc_clip->moveTo(3,41);

//■■■■■■■■■■■■■■ログリスト周辺■■■■■■■■■■■■■■
$ll_sp = new SWFSprite();
addImageToMovie($ll_sp, "tab", "../image/tab.jpg",0,0);
$ll_sp->nextFrame();
$ll_clip=$movie->add($ll_sp);
$ll_clip->setName("loglist_menu");
$ll_clip->moveTo(563,128);

//■■■■■■■■■■■■■■リンク■■■■■■■■■■■■■■
$al_sp = new SWFSprite();
addImageToMovie($al_sp, "base", "../image/link_thumb.jpg",0,0);
//addImageToMovie($al_sp, "ameba", "../image/ameba.jpg",0,0);
//addImageToMovie($al_sp, "photozou", "../image/photozou.jpg",0,0);
$al_sp->nextFrame();
$al_clip=$movie->add($al_sp);
$al_clip->setName("link_thumb");
$al_clip->moveTo(552,277);

//■■■■■■■■■■■■■■コマンドバー■■■■■■■■■■■■■■
$cb_sp = new SWFSprite();
addImageToMovie($cb_sp, "base", "../image/command_bar.jpg",0,0);
$cb_sp->nextFrame();
$cb_clip = $movie->add($cb_sp);
$cb_clip->setName("command_bar");
$cb_clip->moveTo(3,390);

//■■■■■■■■■■■■■■Hideバー(コマンドバーの下を隠す)■■■■■■■■■■■■■■
$hb_sp = new SWFSprite();
addImageToMovie($hb_sp, "base", "../image/hide_bar.jpg",0,0);
$hb_sp->nextFrame();
$hb_clip = $movie->add($hb_sp);
$hb_clip->setName("hide_bar");
$hb_clip->moveTo(3,390);


//■■■■■■■■■■■■■■ヘッダ■■■■■■■■■■■■■■
$hd_sp = new SWFSprite();
addImageToMovie($hd_sp, "base", "../image/header.jpg",0,0);
addImageToMovie($hd_sp, "icon_local", "../image/icon_local.jpg",188,17);
addImageToMovie($hd_sp, "icon_narrow", "../image/icon_narrow.jpg",188,17);
addImageToMovie($hd_sp, "icon_premium", "../image/icon_premium.jpg",255,17);
addImageToMovie($hd_sp, "icon_cm", "../image/icon_cm.jpg",322,17);
addImageToMovie($hd_sp, "icon_mymemory", "../image/icon_mymemory.jpg",188,35);
addImageToMovie($hd_sp, "icon_edit", "../image/icon_edit.jpg",255,35);
addImageToMovie($hd_sp, "icon_hiroba", "../image/icon_hiroba.jpg",255,35);
addImageToMovie($hd_sp, "icon_buttonok", "../image/icon_buttonok.jpg",322,35);
addImageToMovie($hd_sp, "clock", "../image/clock.jpg",187,0);
$hd_sp->nextFrame();
$hd_clip = $movie->add($hd_sp);
$hd_clip->setName("header");
$hd_clip->moveTo(556,3);

//■■■■■■■■■■■■■■下の枠線■■■■■■■■■■■■■■
$bl_sp = new SWFSprite();
addImageToMovie($bl_sp, "base", "../image/bottom_line.jpg",0,0);
$bl_sp->nextFrame();
$bl_clip = $movie->add($bl_sp);
$bl_clip->setName("bottom_line");
$bl_clip->moveTo(0,505);

//■■■■■■■■■■■■■■メインのアクションスクリプト■■■■■■■■■■■■■■

$MainScript = <<<EOT
var useswfversion = $useswfversion;
//最初は隠しておく
_root._visible = false;
//フォーカスの枠は表示しない
_focusRect = false;
var VIDEO;
if (v != undefined) {
    VIDEO = v;
} else if (wv != undefined) {
    VIDEO = wv.substring(wv.lastIndexOf("sm"), wv.lastIndexOf(".flv"));
}
var AD = ad;
if (us != undefined) {
    var US = us;
}
//--------------------- デザイン指定----------------------
// 設定の読み込み
var design_mode = 0;
var design_mode0_so = SharedObject.getLocal("design_mode0");
if (design_mode0_so.data.flag != undefined) {
    if (Boolean(design_mode0_so.data.flag)) {
        design_mode = 0;
    }
}
var design_mode1_so = SharedObject.getLocal("design_mode1");
if (design_mode1_so.data.flag != undefined) {
    if (Boolean(design_mode1_so.data.flag)) {
        design_mode = 1;
    }
}
var design_mode2_so = SharedObject.getLocal("design_mode2");
if (design_mode2_so.data.flag != undefined) {
    if (Boolean(design_mode2_so.data.flag)) {
        design_mode = 2;
    }
}
// design.(name).(x,y,mode)[design_mode]
var design = {
    // wrapperのMovieの位置
    screen: {
        y: [41, 68, 62]
    },
    loglist: {
        y: [122, 152, 144]
    },
    command: {
        y: [390, 420, 414]
    },
    bottom: {
        y: [505, 535, 505]
    },
    // ツールバーのボタン位置
    btn_dl: {
        x: [403, 243, 243]
    },
    btn_conf: {
        x: [440, 280, 280]
    },
    btn_ngid: {
        x: [482, 322, 322]
    },
    btn_kaki: {
        x: [365, 206, 206]
    },
    btn_link: {
        x: [524, 364, 364]
    },
    // 最大化･戻す時のツールバーの位置、表示フラグ(ヘッダあり時)
    large_bar: {
        x: [0, 550, 550],
        y: [0, 50, 50],
        mode: [true, false, false]
    },
    normal_bar: {
        x: [-3, 550, 550],
        y: [-3, 49, 49]
    },
    // nicoplayerの位置調整(オフセット)･表示フラグ
    nico_header: {
        y: [-3, 0, -3],
        mode: [false, true, true]
    },
    nico_video: {
        y: [-28, 0, -6]
    },
    nico_controll: {
        y: [-28, 0, -13]
    },
    nico_input: {
        y: [-26, 0, -25]
    },
    nico_tab: {
        y: [-7, 23, 19]
    },
    nico_tabsize: {
        y: [18, 18, -10]
    } //18以降で大きく-3以降でフォントが小さくなる
};
var main_bar;
design_mode0_so.data.flag = false;
design_mode1_so.data.flag = false;
design_mode2_so.data.flag = false;
switch (design_mode) {
case 0:
    main_bar = main_bar0;
    design_mode0_so.data.flag = true;
    break;
case 1:
    main_bar = main_bar1;
    design_mode1_so.data.flag = true;
    break;
case 2:
    main_bar = main_bar1;
    design_mode2_so.data.flag = true;
    break;
default:
    main_bar = main_bar0;
    design_mode0_so.data.flag = true;
    break;
}
screen._y = design.screen.y[design_mode];
loglist_menu._y = design.loglist.y[design_mode];
command_bar._y = design.command.y[design_mode];
hide_bar._y = design.command.y[design_mode];
bottom_line._y = design.bottom.y[design_mode];
design_mode0_so.flush();
design_mode1_so.flush();
design_mode2_so.flush();
//↓↓↓↓↓↓フィルター処理関連↓↓↓↓↓↓
//カスタムフィルターの処理を何番のコメントまでやったか
var custom_filter_message_count = 0;
//nico.Messages[i]がフィルタにかかったらfilter_flag[i]にtrueいれとく
var filter1_flag = new Array();
var filter2_flag = new Array();
var filter3_flag = new Array();
var filter4_flag = new Array();
//NGID処理を何番のコメントまでやったか
var ngid_filter_message_count = 0;
//nico.Messages[n]がIDフィルターかかったらngid_filter_flag[n]にtrueいれとく
var ngid_filter_flag = new Array();
//nico.Messages[n]が公式のフィルターにかかったらngmessage_flag[n]にtrueをいれる
var ngmessage_flag = new Array();
var filter_count = 0; //フィルタかかってる数(合計)
var filter1_count = 0; //フィルタかかってる個別の数
var filter2_count = 0;
var filter3_count = 0;
var filter4_count = 0;
var ngid_filter_count = 0;
var ngmessage_count = 0;
//↓↓↓↓↓↓ID処理関連↓↓↓↓↓↓
var fwMessages = new Array();
//fwMessages[n].フィールド名
//nico.Messages[n]に整形されてしまう前のxmlデータから抜き出した配列
//アンダーバーがついてるやつはnico.Messagesと一緒
//no      fwMessages[n] もしくは nico.Messages[n]のnと同じ数字が入るはず
//↑バイナリサーチでfwMessagesをuser_idでソートしたあと、元のnが分かるように
//いろいろ面倒なので実際はfwMessages.slice()でコピーしてからソートしたほうがいいかも
//_no       = nico.Messages[n]._no
//_message  = nico.Messages[n]._message
//_vpos     = nico.Messages[n]._vpos(ただし動画の最後3秒ぐらいは違う)
//user_id   = chatノードのuser_id
//raw_user_id  = 今のところundefinedしか送信されていない？
//vpos      = chatノードのvpos (_vposは秒　vpos = _vpos * 100)
//date      = chatノードのdate
//premium   = chatノードのpremium
//mail      = chatノードのmail
//name      = chatノードのname なぜかまだある(今はコメント０の時の頭の警告メッセージしか使ってないっぽい)
//thread    = chatノードのthread
//コメントが０の時のfwMessagesとnico.Messagesはいろいろ違う
//fwMessagesは空で、nico.Messagesは
//nico.Messages[0]にコメントナンバー0,ID0のコメントが1個入っている
//メッセージをいじる時(_mineや_deletedや_slot)以外はfwMessagesから参照したほうがいいかも
//全コメント検索の時とかは、nico.Messages.lengthよりfwMessages.lengthでカウントするとか
//コメント０の時のテストはいまいちやってないので、これ以上は不明
//ニコスコメント用の配列
var fwMessages_Nicos = new Array();
//投稿者コメント用の配列
var fwMessages_ownerthread = new Array();
var ng_ids = new Array(); //NGIDいれとくところ
//ng_idsは新着メッセージの検索処理を最優先させるために、常にuser_idの小さい順にソートしておく
//↑ng_ids[n].フィールド名
//user_id ID
//date    最後にヒットした時のgetTime()
//message 最後にヒットしたコメント内容
var cand_ng_id = new Array(); //強調表示中のIDのコメント一覧
//cand_ng_id[n].フィールド名
//user_id fwMessages[m].user_id
//date    0が入っているはず
//message fwMessages[m]._message
//vpos    fwMessages[m]._vpos これの有無でng_idsの配列と区別がつく
//no      fwMessages[m].no mと一緒ではある
//msgs    fwMessages[m]が通常コメントなら'current'、ニコスコメントなら'nicos'、投稿者コメントなら'game'
//↓最大NGID保存数 これを超えるとヒットが古いのから消される
var max_ng_id = 500;
//↓NGID期限 (単位：日) 指定した期間ヒットしないと消える
var ng_id_expires = 30;
//↑どっちも実際に消去されるのは動画読み込み時
var always_open_ngid_menu = false; //NGIDに追加した時にNGID一覧を表示する
var ngid_menu_bg_alpha = 30; //リストの背景のサムネの透過度 0で読み込まない maxで100
//↓NGIDをオフにするときに押すキーコード
//このキーを押しながらフィルターオフボタンを押すとNGIDもオフにされる
//0を指定すると、キーチェックしない(他のフィルターと同列の扱いになる)
//http://hakuhin.hp.infoseek.co.jp/main/as/key.html#CODE
//ex. ctl=17 shift=16 alt=18
var ngid_off_key_code = 17;
//IDをリストとかに表示するときに頭から何文字まで表示するか
//表示上だけで、ここの数字をいくつにしてもID処理はちゃんと全文字で行われる
var id_length = 7;
//削除するNGIDのNo.
var delete_no = undefined;
var kaki_txt = new Array(); //NGIDいれとくところ
//ng_idsは新着メッセージの検索処理を最優先させるために、常にuser_idの小さい順にソートしておく
//↑ng_ids[n].フィールド名
//user_id ID
//date    最後にヒットした時のgetTime()
//message 最後にヒットしたコメント内容
//↓最大NGID保存数 これを超えるとヒットが古いのから消される
var max_kaki_komi = 500;
//↓NGID期限 (単位：日) 指定した期間ヒットしないと消える
var kaki_komi_expires = 30;
//↑どっちも実際に消去されるのは動画読み込み時
var always_open_kakikomi_menu = false; //NGIDに追加した時にNGID一覧を表示する
var kakikomi_menu_bg_alpha = 0; //リストの背景のサムネの透過度 0で読み込まない maxで100
var delete_kaki_no = undefined;
//Thumb_menu
var thumb_menu_bg_alpha = 100;
//現在表示中のリストのモード
//強調表示中は"cand_ng_id"　通常のリストは"normal"
//適宜ActionScript内で変更するので、ここはいじってはいけない
var list_mode = "normal";
//強調表示切り替え時にコメント編集のチェックが消えるので
//もとの値に戻すためにバックアップしておく場所
var loglist_deleted = new Array();
var loglist_deleted_nicos = new Array();
//強調表示中にメインバーの文字をクリックするとNGIDに登録する
var quick_ngid_mode = true;
var links = new Array(); //自動リンクおよびマイリストを格納しておく
links[0] = new Array(); //自動リンク
links[1] = new Array(); //マイリスト1個目
links[2] = new Array(); //マイリスト2個目
links[3] = new Array(); //マイリスト3個目
//↓共通
//links[n][m].title　動画タイトル
//links[n][m].info　動画の説明文 自動リンク接続エラーの場合はここがundefined
//links[n][m].thumb_status サムネのローディング状況
//links[n][m].number　動画番号(sm9999とか)
//↓自動リンクのみ
//links[n][m].message リンクに反応したコメント(自動リンクのみ)
//links[n][m].user_id コメントのID(自動リンクのみ) タグに反応した場合はundefined
//↓マイリストのみ
//links[n].title　マイリストのタイトル
//links[n].info マイリストの説明文 マイリスト接続エラーの場合はここがundefined
var links_num = new Array(-1, -1); //表示中のタブ番号&サムネ番号
var max_auto_link = 50; //自動リンク数がこれを超えるとリンク作るのやめる
//サムネ読み込み用配列 bufferにいれると適当に読み込んでくれる
var buffer_ary = new Array();
var loading_ary = new Array();
//フィールド名
//list_num 番号 何個目のリストか 0自動リンク 1～マイリスト
//thumb_num 番号 サムネの番号
//url 取得するサムネURL
//timeout 0
//retry 0
//status
//タグの文字列をJavaScriptに抜き出させてvideo_tagsに入れてもらう
var video_tags = new Array();
//うｐ主のマイリストをJavaScriptに（略
var mylists = new Array();
//うｐ主のリンクをJavaScriptに（略
//var owner_links = new Array();
//ビデオのID
var video_id = "";
//タイトル
var video_title = "";
//投稿日
var video_postedAt = "";
//保存する際のファイル名
var file_name = "";
//ローカル再生するファイル名
var local_file_name = "";
//wrapperで使う文字フォント
var user_font = "Arial";
//nico.player.stream_ns.onMetaDataで受け取るビデオのメタデータ
var video_info;
//nico.Messages[i]をsearchMessageで走査したらlink_searched[i]にtrue入れとく
var link_searched = new Array();
var link_searched_nicos = new Array();
var link_searched_ownerthread = new Array();
//通常時のコマンドバーのy座標
var command_bar_default_y = command_bar._y;
var hidebar_default_y = command_bar._y;
var smoothing = false; // スムージングの状態
var large_stage = false; // プレイヤーのheightが536以上かどうか（コマンドバーを配置する）
var flv_booster_load = false; // flv_boosterを読み込んだか
var loglist_sorted_column = 'resno'; // ログリストを通常表示に戻すときのためにソートカラムを保存
var mouse_on_videowindow = false; // マウスがnico.videowindowの上にあるときtrue
var mouse_on_overlay = false; // マウスがnico.controller.controller_submenu.Overlay~~~の上にあるときtrue
var mouse_on_playButton = false; // マウスがmouse_on_playButtonの上にあるときtrue
var mouse_on_clock = false; // マウスがheader.clockの上にあるときtrue
var play_start_flag = false; // swfのメタデータを読み込んだらtrue  nico.player.playStart実行の判定に用いる
//コンテキストメニュー定義
if (useswfversion >= 7) {
    var cmi_play = new ContextMenuItem("再生する");
    cmi_play.enabled = false;
    cmi_play.visible = false;
    cmi_play.separatorBefore = true;
    cmi_play.onSelect = function() {
        nico.player.play();
    };
    var cmi_pause = new ContextMenuItem("一時停止する");
    cmi_pause.enabled = false;
    cmi_pause.visible = false;
    cmi_pause.separatorBefore = true;
    cmi_pause.onSelect = function() {
        nico.player.pause();
    };
    var screen_full = new ContextMenuItem("最大化");
    screen_full.enabled = false;
    screen_full.visible = false;
    screen_full.separatorBefore = true;
    screen_full.onSelect = function() {
        nico.controller.controller_submenu.LargeScreenButton.onRelease();
    };
    var screen_normal = new ContextMenuItem("最小化");
    screen_normal.enabled = false;
    screen_normal.visible = false;
    screen_normal.separatorBefore = true;
    screen_normal.onSelect = function() {
        nico.controller.controller_submenu.NormalScreenButton.onRelease();
    };
    var cmi_smoothing_on = new ContextMenuItem("スムージングON");
    cmi_smoothing_on.enabled = false;
    //cmi_smoothing_on.visible = false;
    cmi_smoothing_on.separatorBefore = true;
    cmi_smoothing_on.onSelect = function() {
        changeSmoothing(true, true);
    };
    var cmi_smoothing_off = new ContextMenuItem("スムージングOFF");
    cmi_smoothing_off.enabled = false;
    //cmi_smoothing_off.visible = false;
    cmi_smoothing_off.separatorBefore = false;
    cmi_smoothing_off.onSelect = function() {
        changeSmoothing(false, true);
    };
    var cmi_aspect_original = new ContextMenuItem("元の比率に戻す");
    cmi_aspect_original.enabled = false;
    //cmi_aspect_original.visible = false;
    cmi_aspect_original.separatorBefore = true;
    cmi_aspect_original.onSelect = function() {
        changeAspect(nico.player.videoStream_width, nico.player.videoStream_height);
    };
    var cmi_aspect_4_3 = new ContextMenuItem("比率変更  4:3");
    cmi_aspect_4_3.enabled = false;
    //cmi_aspect_4_3.visible = false;
    cmi_aspect_4_3.separatorBefore = false;
    cmi_aspect_4_3.onSelect = function() {
        changeAspect(4, 3);
    };
    var cmi_aspect_16_9 = new ContextMenuItem("比率変更  16:9");
    cmi_aspect_16_9.enabled = false;
    //cmi_aspect_16_9.visible = false;
    cmi_aspect_16_9.separatorBefore = false;
    cmi_aspect_16_9.onSelect = function() {
        changeAspect(16, 9);
    };
    var cmi_switch_add_id_overlay = new ContextMenuItem("動画上：ID表示/非表示 切替");
    cmi_switch_add_id_overlay.enabled = true;
    cmi_switch_add_id_overlay.visible = false;
    cmi_switch_add_id_overlay.separatorBefore = true;
    cmi_switch_add_id_overlay.onSelect = function(obj, menu) {
        if (add_id_overlay) {
            pref_menu.add_id_overlay.on._visible = false;
            add_id_overlay = false;
            add_id_overlay_so.data.flag = false;
            add_id_overlay_so.flush();
        } else {
            pref_menu.add_id_overlay.on._visible = true;
            add_id_overlay = true;
            add_id_overlay_so.data.flag = true;
            add_id_overlay_so.flush();
        }
    };
    /*
    var cmi_clear_allmessages = new ContextMenuItem("動画上：全てのコメント表示");
    cmi_clear_allmessages.enabled = true;
    cmi_clear_allmessages.visible = true;
    cmi_clear_allmessages.separatorBefore = false;
    cmi_clear_allmessages.onSelect = function(){
        updateFilter("clear_all_messages");
    };
    */
    var cmi_copy_id = new ContextMenuItem("IDをコピー");
    cmi_copy_id.enabled = false;
    cmi_copy_id.visible = false;
    cmi_copy_id.separatorBefore = true;
    cmi_copy_id.onSelect = function(obj, menu) {
        if (obj.selectedItem != undefined) {
            System.setClipboard(obj.selectedItem.user);
        }
    };
    var cmi_copy_message = new ContextMenuItem("本文をコピー");
    cmi_copy_message.enabled = false;
    cmi_copy_message.visible = false;
    cmi_copy_message.separatorBefore = false;
    cmi_copy_message.onSelect = function(obj, menu) {
        if (obj.selectedItem != undefined) {
            var mes = obj.selectedItem.message;
            if (add_id) {
                var index = mes.indexOf('] ');
                if (index > 0) {
                    mes = mes.substr(index + 2);
                }
            }
            System.setClipboard(mes);
        }
    };
    var cmi_open_links = new ContextMenuItem("本文中のリンクを開く");
    cmi_open_links.enabled = false;
    cmi_open_links.visible = false;
    cmi_open_links.separatorBefore = true;
    cmi_open_links.onSelect = function(obj, menu) {
        if (obj.selectedItem != undefined) {
            var mes = obj.selectedItem.message;
            if (add_id) {
                var index = mes.indexOf('] ');
                if (index > 0) {
                    mes = mes.substr(index + 2);
                }
            }
            var cand_links = searchMessage(mes);
            for (var i = 0; i < cand_links.length; i++) {
                var num = cand_links[i].number;
                if (num != undefined) {
                    var url;
                    if (num.indexOf("http://") >= 0) {
                        url = num;
                    } else {
                        url = "/watch/" + num;
                    }
                    if (auto_link_blank) {
                        getURL(url, '_blank');
                    } else {
                        getURL(url);
                    }
                    if (nico.player.__get__state() == "playing") {
                        nico.player.pause();
                    }
                }
            }
        }
    };
    var cmi_search_id = new ContextMenuItem("本文中のIDを抽出");
    cmi_search_id.enabled = false;
    cmi_search_id.visible = false;
    cmi_search_id.separatorBefore = false;
    cmi_search_id.onSelect = function(obj, menu) {
        if (obj.selectedItem != undefined) {
            var mes = obj.selectedItem.message;
            if (add_id) {
                var index = mes.indexOf('] ');
                if (index > 0) {
                    mes = mes.substr(index + 2);
                }
            }
        }
    };
    var cmi_show_profile = new ContextMenuItem("プロフィールを開く");
    cmi_show_profile.enabled = false;
    cmi_show_profile.visible = false;
    cmi_show_profile.separatorBefore = true;
    cmi_show_profile.onSelect = function(obj, menu) {
        if (obj.selectedItem != undefined) {
            var id = obj.selectedItem.user;
            var url = "/user/" + id;
            if (auto_link_blank) {
                getURL(url, '_blank');
            } else {
                getURL(url);
            }
        }
    };
    var cmi_switch_add_id = new ContextMenuItem("ログリスト：ID表示/非表示 切替");
    cmi_switch_add_id.enabled = true;
    cmi_switch_add_id.visible = false;
    cmi_switch_add_id.separatorBefore = true;
    cmi_switch_add_id.onSelect = function(obj, menu) {
        if (add_id) {
            pref_menu.add_id.on._visible = false;
            add_id = false;
            add_id_so.data.flag = false;
            add_id_so.flush();
            if (list_mode == "normal") {
                updateLogList("normal");
            } else {
                updateLogList("cand_ng_id");
            }
            updateLogList("nicos");
            updateLogList("ownerthread");
        } else {
            pref_menu.add_id.on._visible = true;
            add_id = true;
            add_id_so.data.flag = true;
            add_id_so.flush();
            if (list_mode == "normal") {
                updateLogList("normal");
            } else {
                updateLogList("cand_ng_id");
            }
            updateLogList("nicos");
            updateLogList("ownerthread");
        }
    };
}
//↓↓↓↓↓↓バージョン情報↓↓↓↓↓↓
var version = "$version";
var flash_info = System.capabilities.version; // output MAC 9,0,115,0
var flash_version = System.capabilities.version.split(" ")[1].split(",")[0]; // "10" と出力されます
//↓↓↓↓↓↓以下実験とかデバッグっぽい用↓↓↓↓↓↓
//↓↓↓↓↓↓テストモード　いろいろ↓↓↓↓↓↓
var test_mode = false;
//↓↓↓↓↓↓コメント自動収集実験用↓↓↓↓↓↓
var auto_comment_post = false;
var auto_comment_status = "ready"; //"ready" "connecting"
var comment_server = "http://localhost/cgi-bin/nico-comment.cgi"; //POST先のCGI
var local_last_no = 0; //ローカルに保存されてる最後のコメント番号
var local_total_count = 0; //ローカル保存されてるコメントのトータル数
var total_add_count = 0; //動画読み込んでから何件追加保存したか
//↓↓↓↓↓↓完全ローカル再生実験用 ↓↓↓↓↓↓
var local_from = "random"; //保存コメントの何番目から読み込むか
//コメントが1000件保存されていて、max_commentsが500の場合
//local_from=1 1～500
//local_from=-50 451～950
//local_from=0 501～1000
//local_from="random" 適当に500件読み込む
var max_comments = 250; //最大読み込みコメント数 あとで動画の長さから決定するのでこの数字いじっても意味はない
var limit_comments = 1000; //数千とか重すぎるので max_commentsがこれを超えるとこっち採用
var playLocalXML_TimerID;
//↓↓↓↓↓↓設定の初期設定とか flash側の設定が見つからない時用↓↓↓↓↓↓
var auto_repeat = false;
var end_time_ary = new Array();
var end_time = 0;
var auto_repeat_status = "ready"; //ready,start
var check_repeat_threshold = 1.5; //残り1.5秒を切ると、タイマー起動
var auto_link = false;
var auto_display_auto_link = true;
var auto_link_blank = false;
var add_id = false;
var add_id_overlay = false;
var show_info = false;
var kill_enter = false;
var copy_title = false;
var hide_log = false;
var hide_comment = false;
var change_maintab = false;
var download_blank = true;
var clip_height = false;
var copy_to_clip_board = false;
var copy_message_to_clip_board = false;
var resMax = 0;
var resMax_overwrite = false;
var resMax_overwrite_num = 1000;
var wheel_volume = false;
var wheel_volume_value = 5;
var local_server = false;
var local_server_name = new Array();
local_server_name[0] = "";
var local_server_index = new Array();
local_server_index[0] = "";
var repeat_timerID;
var mouse_wheel = false;
var mouse_reverse = false;
var mouse_forward = 10;
var mouse_backward = 15;
var auto_play = true;
var always_back_to_normal_mode = false;
var change_title = false;
var use_javascript = true;
var wide_seek_bar = false;
var auto_comment_get = true;
var filter1_on = false;
var filter1_name = "上";
var filter1_commands = "place=ue";
var filter2_on = false;
var filter2_name = "下";
var filter2_commands = "place=shita";
var filter3_on = false;
var filter3_name = "大";
var filter3_commands = "size=big";
var filter4_on = false;
var filter4_name = "色";
var filter4_commands = "color=all";
var filter5_on = true; //設定にはないけどNGIDフィルター
var hide_header = false;
var push_out_inputarea = false;
//var auto_scroll_loglist = true;
var pass_through_message_filter = false;
var disable_nicoscript = false;
var auto_smoothing = false;
var auto_smoothing_off = false;
var use_flv_booster = false;
//var flv_booster_url = "http://local.ptron/";
var change_bgcolor = false;
var first_time_full = false;
var end_time_normal = false;
var key_operation = false;
var force_seek = false;
var transparent_header = false;
var transparent_inputarea = false;
var inputarea_alpha = 60;
var cm_inputarea_alpha = 60;
var cm_transparent_inputarea = false;
var timed_hide_header = false;
var timed_hide_inputarea = false;
var timed_hide_timelimit = 2;
var click_pause = false;
var double_click_fullscreen = false;
var click_ime_off = false;
var transparent_comment = false;
var hide_comment_with_filter = false;
var apply_kakikomi = false;
var load_marquee = false;
var load_hiroba = false;
var marquee_skip = false;
var hide_icon_cm = false;
var load_NiconiCM = false;
var autopop_cm = false;
var autopop_mode = false;
var jihou_timer; //時報終了検知用タイマー
var comment_alpha = 30;
var clock_mode = 0;
var pre_clock_mode; //@CM時clock_modeの値を一時格納
var exception_cm = false;
//↓↓↓↓↓↓設定の読み込み ↓↓↓↓↓↓
var transparent_comment_so = SharedObject.getLocal("transparent_comment");
if (transparent_comment_so.data.flag != undefined) {
    transparent_comment = Boolean(transparent_comment_so.data.flag);
}
if (transparent_comment_so.data.alpha != undefined) {
    comment_alpha = Number(transparent_comment_so.data.alpha);
}
var resMax_overwrite_so = SharedObject.getLocal("resMax_overwrite");
if (resMax_overwrite_so.data.flag != undefined) {
    resMax_overwrite = Boolean(resMax_overwrite_so.data.flag);
}
if (resMax_overwrite_so.data.num != undefined) {
    resMax_overwrite_num = Number(resMax_overwrite_so.data.num);
}
var wheel_volume_so = SharedObject.getLocal("wheel_volume");
if (wheel_volume_so.data.flag != undefined) {
    wheel_volume = Boolean(wheel_volume_so.data.flag);
}
if (wheel_volume_so.data.value != undefined) {
    wheel_volume_value = Number(wheel_volume_so.data.value);
}
var flv_booster_so = SharedObject.getLocal("flv_booster");
if (flv_booster_so.data.flag != undefined) {
    use_flv_booster = Boolean(flv_booster_so.data.flag);
}
//if(flv_booster_so.data.url != undefined){flv_booster_url = flv_booster_so.data.url;}
var local_server_so = SharedObject.getLocal("local_server");
if (local_server_so.data.flag != undefined) {
    local_server = Boolean(local_server_so.data.flag);
}
if (local_server_so.data.name != undefined) {
    local_server_name[0] = local_server_so.data.name;
}
if (local_server_so.data.index != undefined) {
    local_server_index[0] = local_server_so.data.index;
}
var check_html_status = "waiting"; // タグ及びマイリストリンクのチェックフラグ
var check_title_status = "waiting"; // タイトル取得のチェックフラグ
var video_tags_status = "waiting"; // javascriptでのvideo_tags取得のチェックフラグ
var mylists_status = "waiting"; // javascriptでのmylists取得のチェックフラグ
var check_flv_status = "waiting"; //"waiting" "ready" "connecting"ローカルflv検索の状況
var local_server_num = 0;
//↓ローカルサーバーを複数設定できる
//flvが大量にたまってきて、管理のために複数ディレクトリに分けたりする人向け
//配列local_server_name(flashの設定の一行目)とlocal_server_index(２行目)に
//local_server_name.push("http://localhost/flv/imas/")
//local_server_index.push("http://localhost/flv/imas/")
//とかしてやればいい
//配列の0番目がflash側で設定する項目
//サブディレクトリ全部勝手に検索とかしたかったが、いろいろめんどうで断念
//↓サンプル
//増えてくるとflvチェックに時間かかるし、なんかいい方法ないものか
//local_server_name.push("http://localhost/niconico/flv/bookmark/saizyotobuta/");
//local_server_index.push("http://localhost/niconico/flv/bookmark/saizyotobuta/");
//local_server_name.push("http://localhost/niconico/flv/bookmark/tennnennmusumetobuta/");
//local_server_index.push("http://localhost/niconico/flv/bookmark/tennnennmusumetobuta/");
//local_server_name.push("http://localhost/niconico/flv/bookmark/setonohanayome/");
//local_server_index.push("http://localhost/niconico/flv/bookmark/setonohanayome/");
//local_server_name.push("http://localhost/niconico/flv/bookmark/potemayo/");
//local_server_index.push("http://localhost/niconico/flv/bookmark/potemayo/");
//local_server_name.push("http://localhost/niconico/flv/bookmark/tukunechan/");
//local_server_index.push("http://localhost/niconico/flv/bookmark/tukunechan/");
//local_server_name.push("http://localhost/niconico/flv/bookmark/bio4/");
//local_server_index.push("http://localhost/niconico/flv/bookmark/bio4/");
//local_server_name.push("http://localhost/niconico/flv/imas_sozai/");
//local_server_index.push("http://localhost/niconico/flv/imas_sozai/");
//local_server_name.push("http://localhost/niconico/flv/upload/");
//local_server_index.push("http://localhost/niconico/flv/upload/");
var add_id_so = SharedObject.getLocal("add_id");
if (add_id_so.data.flag != undefined) {
    add_id = Boolean(add_id_so.data.flag);
}
var add_id_overlay_so = SharedObject.getLocal("add_id_overlay");
if (add_id_overlay_so.data.flag != undefined) {
    add_id_overlay = Boolean(add_id_overlay_so.data.flag);
}
var show_info_so = SharedObject.getLocal("show_info");
if (show_info_so.data.flag != undefined) {
    show_info = Boolean(show_info_so.data.flag);
}
var kill_enter_so = SharedObject.getLocal("kill_enter");
if (kill_enter_so.data.flag != undefined) {
    kill_enter = Boolean(kill_enter_so.data.flag);
}
var click_pause_so = SharedObject.getLocal("click_pause");
if (click_pause_so.data.flag != undefined) {
    click_pause = Boolean(click_pause_so.data.flag);
}
var double_click_fullscreen_so = SharedObject.getLocal("double_click_fullscreen");
if (double_click_fullscreen_so.data.flag != undefined) {
    double_click_fullscreen = Boolean(double_click_fullscreen_so.data.flag);
}
var click_ime_off_so = SharedObject.getLocal("click_ime_off");
if (click_ime_off_so.data.flag != undefined) {
    click_ime_off = Boolean(click_ime_off_so.data.flag);
}
var copy_title_so = SharedObject.getLocal("copy_title");
if (copy_title_so.data.flag != undefined) {
    copy_title = Boolean(copy_title_so.data.flag);
}
var hide_log_so = SharedObject.getLocal("hide_log");
if (hide_log_so.data.flag != undefined) {
    hide_log = Boolean(hide_log_so.data.flag);
}
var hide_comment_so = SharedObject.getLocal("hide_comment");
if (hide_comment_so.data.flag != undefined) {
    hide_comment = Boolean(hide_comment_so.data.flag);
}
var change_maintab_so = SharedObject.getLocal("change_maintab");
if (change_maintab_so.data.flag != undefined) {
    change_maintab = Boolean(change_maintab_so.data.flag);
}
var hide_comment_with_filter_so = SharedObject.getLocal("hide_comment_with_filter");
if (hide_comment_with_filter_so.data.flag != undefined) {
    hide_comment_with_filter = Boolean(hide_comment_with_filter_so.data.flag);
}
var apply_kakikomi_so = SharedObject.getLocal("apply_kakikomi");
if (apply_kakikomi_so.data.flag != undefined) {
    apply_kakikomi = Boolean(apply_kakikomi_so.data.flag);
}
var download_blank_so = SharedObject.getLocal("download_blank");
if (download_blank_so.data.flag != undefined) {
    download_blank = Boolean(download_blank_so.data.flag);
}
var clip_height_so = SharedObject.getLocal("clip_height");
if (clip_height_so.data.flag != undefined) {
    clip_height = Boolean(clip_height_so.data.flag);
}
var copy_to_clip_board_so = SharedObject.getLocal("copy_to_clip_board");
if (copy_to_clip_board_so.data.flag != undefined) {
    copy_to_clip_board = Boolean(copy_to_clip_board_so.data.flag);
}
var copy_message_to_clip_board_so = SharedObject.getLocal("copy_message_to_clip_board");
if (copy_message_to_clip_board_so.data.flag != undefined) {
    copy_message_to_clip_board = Boolean(copy_message_to_clip_board_so.data.flag);
}
var change_bgcolor_so = SharedObject.getLocal("change_bgcolor");
if (change_bgcolor_so.data.flag != undefined) {
    change_bgcolor = Boolean(change_bgcolor_so.data.flag);
}
var first_time_full_so = SharedObject.getLocal("first_time_full");
if (first_time_full_so.data.flag != undefined) {
    first_time_full = Boolean(first_time_full_so.data.flag);
}
var end_time_normal_so = SharedObject.getLocal("end_time_normal");
if (end_time_normal_so.data.flag != undefined) {
    end_time_normal = Boolean(end_time_normal_so.data.flag);
}
var auto_repeat_so = SharedObject.getLocal("auto_repeat");
if (auto_repeat_so.data.flag != undefined) {
    auto_repeat = Boolean(auto_repeat_so.data.flag);
}
if (auto_repeat_so.data.end_time_ary != undefined) {
    end_time_ary = auto_repeat_so.data.end_time_ary;
}
for (var i = 0; i < end_time_ary.length; i++) {
    if (end_time_ary[i].number == VIDEO) {
        end_time = end_time_ary[i].time;
        break;
    }
}
var auto_link_so = SharedObject.getLocal("auto_link");
if (auto_link_so.data.flag != undefined) {
    auto_link = Boolean(auto_link_so.data.flag);
}
if (auto_link_so.data.auto_display != undefined) {
    auto_display_auto_link = Boolean(auto_link_so.data.auto_display);
}
if (auto_link_so.data._blank != undefined) {
    auto_link_blank = Boolean(auto_link_so.data._blank);
}
var ng_ids_so = SharedObject.getLocal("ng_ids");
if (ng_ids_so.data.ids != undefined) {
    ng_ids = ng_ids_so.data.ids;
}
//旧バージョンのng_idsなら適当に整形　そろそろ消す→消した
//if(ng_ids.length > 0 && ng_ids[0].user_id == undefined){
//  var new_ng_ids = new Array();
//  var myDate = new Date();
//  var now = myDate.getTime();
//  for(var i=0; i<ng_ids.length; i++){
//      new_ng_ids.push({user_id: ng_ids[i], date: now, message: "unknown"});
//  }
//  ng_ids = new_ng_ids;
//}
//旧バージョン用　user_idがnumberならstringにする　そろそろ消す
if (ng_ids.length > 0 && typeof(ng_ids[0].user_id) == "number") {
    alert_js("Number -> String");
    for (var i = 0; i < ng_ids.length; i++) {
        ng_ids[i].user_id = ng_ids[i].user_id.toString();
    }
}
var max_ng_id_so = SharedObject.getLocal("max_ng_id");
if (max_ng_id_so.data.value != undefined) {
    max_ng_id = Number(max_ng_id_so.data.value);
}
var ng_id_expires_so = SharedObject.getLocal("ng_id_expires");
if (ng_id_expires_so.data.value != undefined) {
    ng_id_expires = Number(ng_id_expires_so.data.value);
}
/*kakikomiの保存*/
var kaki_txt_so = SharedObject.getLocal("kaki_txt");
if (kaki_txt_so.data.ids != undefined) {
    kaki_txt = kaki_txt_so.data.ids;
}
var max_kaki_komi_so = SharedObject.getLocal("max_kaki_komi");
if (max_kaki_komi_so.data.value != undefined) {
    max_kaki_komi = Number(max_kaki_komi_so.data.value);
}
var kaki_komi_expires_so = SharedObject.getLocal("kaki_komi_expires");
if (kaki_komi_expires_so.data.value != undefined) {
    kaki_komi_expires = Number(kaki_komi_expires_so.data.value);
}
var mouse_wheel_so = SharedObject.getLocal("mouse_wheel");
if (mouse_wheel_so.data.flag != undefined) {
    mouse_wheel = Boolean(mouse_wheel_so.data.flag);
}
if (mouse_wheel_so.data.reverse != undefined) {
    mouse_reverse = Boolean(mouse_wheel_so.data.reverse);
}
if (mouse_wheel_so.data.forward != undefined) {
    mouse_forward = Number(mouse_wheel_so.data.forward);
}
if (mouse_wheel_so.data.backward != undefined) {
    mouse_backward = Number(mouse_wheel_so.data.backward);
}
var key_operation_so = SharedObject.getLocal("key_operation");
if (key_operation_so.data.flag != undefined) {
    key_operation = Boolean(key_operation_so.data.flag);
}
var force_seek_so = SharedObject.getLocal("force_seek");
if (force_seek_so.data.flag != undefined) {
    force_seek = Boolean(force_seek_so.data.flag);
}
var auto_play_so = SharedObject.getLocal("auto_play");
if (auto_play_so.data.flag != undefined) {
    auto_play = Boolean(auto_play_so.data.flag);
}
var always_back_to_normal_mode_so = SharedObject.getLocal("always_back_to_normal_mode");
if (always_back_to_normal_mode_so.data.flag != undefined) {
    always_back_to_normal_mode = Boolean(always_back_to_normal_mode_so.data.flag);
}
var change_title_so = SharedObject.getLocal("change_title");
if (change_title_so.data.flag != undefined) {
    change_title = Boolean(change_title_so.data.flag);
}
//var use_javascript_so = SharedObject.getLocal("use_javascript");
//if(use_javascript_so.data.flag != undefined){use_javascript = Boolean(use_javascript_so.data.flag);}
var wide_seek_bar_so = SharedObject.getLocal("wide_seek_bar");
if (wide_seek_bar_so.data.flag != undefined) {
    wide_seek_bar = Boolean(wide_seek_bar_so.data.flag);
}
var hide_header_so = SharedObject.getLocal("hide_header");
if (hide_header_so.data.flag != undefined) {
    hide_header = Boolean(hide_header_so.data.flag);
}
var push_out_inputarea_so = SharedObject.getLocal("push_out_inputarea");
if (push_out_inputarea_so.data.flag != undefined) {
    push_out_inputarea = Boolean(push_out_inputarea_so.data.flag);
}
var transparent_header_so = SharedObject.getLocal("transparent_header");
if (transparent_header_so.data.flag != undefined) {
    transparent_header = Boolean(transparent_header_so.data.flag);
}
//if(transparent_header_so.data.alpha != undefined){header_alpha = Number(transparent_header_so.data.alpha);}
var transparent_inputarea_so = SharedObject.getLocal("transparent_inputarea");
if (transparent_inputarea_so.data.flag != undefined) {
    transparent_inputarea = Boolean(transparent_inputarea_so.data.flag);
}
if (transparent_inputarea_so.data.alpha != undefined) {
    inputarea_alpha = Number(transparent_inputarea_so.data.alpha);
}
var cm_transparent_inputarea_so = SharedObject.getLocal("cm_transparent_inputarea");
if (cm_transparent_inputarea_so.data.flag != undefined) {
    cm_transparent_inputarea = Boolean(cm_transparent_inputarea_so.data.flag);
}
if (cm_transparent_inputarea_so.data.alpha != undefined) {
    cm_inputarea_alpha = Number(cm_transparent_inputarea_so.data.alpha);
}
//var timed_hide_header_so = SharedObject.getLocal("timed_hide_header");
//if(timed_hide_header_so.data.flag != undefined){timed_hide_header = Boolean(timed_hide_header_so.data.flag);}
timed_hide_header = transparent_header;
//var timed_hide_inputarea_so = SharedObject.getLocal("timed_hide_inputarea");
//if(timed_hide_inputarea_so.data.flag != undefined){timed_hide_inputarea = Boolean(timed_hide_inputarea_so.data.flag);}
timed_hide_inputarea = transparent_inputarea;
var timed_hide_timelimit_so = SharedObject.getLocal("timed_hide_timelimit");
if (timed_hide_timelimit_so.data.value != undefined) {
    timed_hide_timelimit = Number(timed_hide_timelimit_so.data.value);
}
//var auto_scroll_loglist_so = SharedObject.getLocal("auto_scroll_loglist");
//if(auto_scroll_loglist_so.data.flag != undefined){auto_scroll_loglist = Boolean(auto_scroll_loglist_so.data.flag);}
var pass_through_message_filter_so = SharedObject.getLocal("pass_through_message_filter");
if (pass_through_message_filter_so.data.flag != undefined) {
    pass_through_message_filter = Boolean(pass_through_message_filter_so.data.flag);
}
var disable_nicoscript_so = SharedObject.getLocal("disable_nicoscript");
if (disable_nicoscript_so.data.flag != undefined) {
    disable_nicoscript = Boolean(disable_nicoscript_so.data.flag);
}
var auto_smoothing_so = SharedObject.getLocal("auto_smoothing");
if (auto_smoothing_so.data.flag != undefined) {
    auto_smoothing = Boolean(auto_smoothing_so.data.flag);
}
var auto_smoothing_off_so = SharedObject.getLocal("auto_smoothing_off");
if (auto_smoothing_off_so.data.flag != undefined) {
    auto_smoothing_off = Boolean(auto_smoothing_off_so.data.flag);
}
var auto_comment_get_so = SharedObject.getLocal("auto_comment_get");
if (auto_comment_get_so.data.flag != undefined) {
    auto_comment_get = Boolean(auto_comment_get_so.data.flag);
}
var filter_so = SharedObject.getLocal("filter");
var filter_command_ary = new Array();
loadCustomFilter();
//↓あとでボタンから呼び出すかもしれないので、これだけfunction

function loadCustomFilter() {
    if (filter_so.data.filter1_flag != undefined) {
        filter1_on = Boolean(filter_so.data.filter1_flag);
    }
    if (filter_so.data.filter2_flag != undefined) {
        filter2_on = Boolean(filter_so.data.filter2_flag);
    }
    if (filter_so.data.filter3_flag != undefined) {
        filter3_on = Boolean(filter_so.data.filter3_flag);
    }
    if (filter_so.data.filter4_flag != undefined) {
        filter4_on = Boolean(filter_so.data.filter4_flag);
    }
    if (filter_so.data.filter1_commands != undefined) {
        filter1_commands = filter_so.data.filter1_commands;
    }
    if (filter_so.data.filter1_name != undefined) {
        filter1_name = filter_so.data.filter1_name;
    }
    if (filter_so.data.filter2_commands != undefined) {
        filter2_commands = filter_so.data.filter2_commands;
    }
    if (filter_so.data.filter2_name != undefined) {
        filter2_name = filter_so.data.filter2_name;
    }
    if (filter_so.data.filter3_commands != undefined) {
        filter3_commands = filter_so.data.filter3_commands;
    }
    if (filter_so.data.filter3_name != undefined) {
        filter3_name = filter_so.data.filter3_name;
    }
    if (filter_so.data.filter4_commands != undefined) {
        filter4_commands = filter_so.data.filter4_commands;
    }
    if (filter_so.data.filter4_name != undefined) {
        filter4_name = filter_so.data.filter4_name;
    }
    for (var i = 1; i <= 4; i++) {
        filter_command_ary[i] = parseCommand(_root["filter" + i + "_commands"]);
        var btn = main_bar["filter" + i];
        if (btn != undefined) {
            btn.name.text = _root["filter" + i + "_name"];
            btn.name.setTextFormat(white12b_fmt);
            btn.name._x = 0 - btn.name._width / 2;
            if (_root["filter" + i + "_on"]) {
                btn._alpha = 40;
            } else {
                btn._alpha = 100;
            }
        }
        _root["filter" + i + "_flag"] = new Array();
        _root["filter" + i + "_count"] = 0;
    }
}
var clock_mode_so = SharedObject.getLocal("clock_mode");
if (clock_mode_so.data.number != undefined) {
    clock_mode = Number(clock_mode_so.data.number);
}
var forbid_relation_so = SharedObject.getLocal("forbid_relation");
if (forbid_relation_so.data.flag != undefined) {
    forbid_relation = Boolean(forbid_relation_so.data.flag);
}
var hold_connect_board_so = SharedObject.getLocal("hold_connect_board");
if (hold_connect_board_so.data.flag != undefined) {
    hold_connect_board = Boolean(hold_connect_board_so.data.flag);
}
var load_marquee_so = SharedObject.getLocal('load_marquee');
if (load_marquee_so.data.flag != undefined) {
    load_marquee = Boolean(load_marquee_so.data.flag);
}
var load_hiroba_so = SharedObject.getLocal('load_hiroba');
if (load_hiroba_so.data.flag != undefined) {
    load_hiroba = Boolean(load_hiroba_so.data.flag);
}
var marquee_skip_so = SharedObject.getLocal('marquee_skip');
if (marquee_skip_so.data.flag != undefined) {
    marquee_skip = Boolean(marquee_skip_so.data.flag);
}
var load_NiconiCM_so = SharedObject.getLocal('load_NiconiCM');
if (load_NiconiCM_so.data.flag != undefined) {
    load_NiconiCM = Boolean(load_NiconiCM_so.data.flag);
}
var hide_icon_cm_so = SharedObject.getLocal('hide_icon_cm');
if (hide_icon_cm_so.data.flag != undefined) {
    hide_icon_cm = Boolean(hide_icon_cm_so.data.flag);
}
var autopop_cm_so = SharedObject.getLocal('autopop_cm');
if (autopop_cm_so.data.flag != undefined) {
    autopop_cm = Boolean(autopop_cm_so.data.flag);
}
//テスト
var test_mode_so = SharedObject.getLocal('test_mode');
if (test_mode_so.data.flag != undefined) {
    test_mode = Boolean(test_mode_so.data.flag);
}
//↓↓↓↓↓↓ちょっと間隔を置く処理とか用↓↓↓↓↓↓
var check_interval = 599; //定期処理するためのタイマーみたいなの
//var mouse_wheel_interval;//マウスホイールが連続で行われたかどうかのチェック
//↓↓↓↓↓↓flvplayer実行前のチェック↓↓↓↓↓↓
//通常 or ローカルFLV or 完全ローカルモード
var local_file_found = false; //ローカルFLVがあるかどうか
var getflv_status = "waiting"; //"ready" "waiting" "done"
if (wv != undefined) { //完全ローカルモード
    auto_comment_post = false;
    countLocalXML(VIDEO); //保存済みコメントのラスト番号を調べにいく
} else if (local_server == true && local_server_name.length != 0 && local_server_index.length != 0) {
    check_flv_status = "ready";
    //あとはtimeLine.check_flvで勝手に調べてくれる
} else {
    getflv_status = "ready"; //ローカルFLVでも完全ローカルモードでもなければgetflvする
}
//↓↓↓↓↓↓flvplayer呼び出し↓↓↓↓↓↓
createEmptyMovieClip("nico", 1);
//最初は隠しておく
nico._visible = false;
// ニコニコ動画APIの変更を上書きする http://dic.nicovideo.jp/a/%E3%83%8B%E3%82%B3%E3%83%8B%E3%82%B3%E5%8B%95%E7%94%BBapi
nico.GETFLV_URL = "http://flapi.nicovideo.jp/api/getflv";
//各変数をflvplayerに渡す
var flvplayer_url = "/swf/nicoplayer.swf?ts=" + ts;
if (has_owner_thread != undefined) {
    flvplayer_url += "&has_owner_thread=" + has_owner_thread;
}
if (owner_thread_edit_mode != undefined) {
    flvplayer_url += "&owner_thread_edit_mode=" + owner_thread_edit_mode;
}
if (isOwnerThreadEditor != undefined) {
    flvplayer_url += "&isOwnerThreadEditor=" + isOwnerThreadEditor;
}
if (is_video_owner != undefined) {
    flvplayer_url += "&is_video_owner=" + is_video_owner;
}
if (e != undefined) {
    flvplayer_url += "&e=" + e;
}
if (ro != undefined) {
    flvplayer_url += "&ro=" + ro;
}
if (mm != undefined) {
    flvplayer_url += "&mm=" + mm;
}
if (lo != undefined) {
    flvplayer_url += "&lo=" + lo;
}
if (eco != undefined) {
    flvplayer_url += "&eco=" + eco;
}
if (iee != undefined) {
    flvplayer_url += "&iee=" + iee;
}
if (dlcw != undefined) {
    flvplayer_url += "&dlcw=" + dlcw;
}
if (wv_id != undefined) {
    flvplayer_url += "&wv_id=" + wv_id;
}
if (wv_title != undefined) {
    //.phpがあると誤爆して死ぬので
    wv_title = replaceSentence(wv_title, ".php", "");
    flvplayer_url += "&wv_title=" + wv_title;
}
if (wv_code != undefined) {
    flvplayer_url += "&wv_code=" + wv_code;
}
if (wv_time != undefined) {
    flvplayer_url += "&wv_time=" + wv_time;
}
if (deleted != undefined) {
    flvplayer_url += "&deleted=" + deleted;
}
if (player_version_xml != undefined) {
    flvplayer_url += "&player_version_xml=" + player_version_xml;
}
// ニコスクリプトなどの投稿者コメントを表示
open_src = true;
if (open_src != undefined) {
    flvplayer_url += "&open_src=" + open_src;
}
if (thumbPlayKey != undefined) {
    flvplayer_url += "&thumbPlayKey=" + thumbPlayKey;
}
if (thumbWatch != undefined) {
    flvplayer_url += "&thumbWatch=" + thumbWatch;
}
if (mylist_counter != undefined) {
    flvplayer_url += "&mylist_counter=" + mylist_counter;
}
if (movie_type != undefined) {
    if (movie_type == 'mp4') {
        flvplayer_url += "&movie_type=%20" + movie_type;
    } else {
        flvplayer_url += "&movie_type=" + movie_type;
    }
}
if (fv_autoplay != undefined) {
    flvplayer_url += "&fv_autoplay=" + fv_autoplay;
}
if (fv_no_comment != undefined) {
    flvplayer_url += "&fv_no_comment=" + fv_no_comment;
}
if (fv_no_comment_btn != undefined) {
    flvplayer_url += "&fv_no_comment_btn=" + fv_no_comment_btn;
}
if (fv_no_jump_msg != undefined) {
    flvplayer_url += "&fv_no_jump_msg=" + fv_no_jump_msg;
}
if (fv_no_link != undefined) {
    flvplayer_url += "&fv_no_link=" + fv_no_link;
}
if (fv_no_sound != undefined) {
    flvplayer_url += "&fv_no_sound=" + fv_no_sound;
}
if (fv_no_pizza != undefined) {
    flvplayer_url += "&fv_no_pizza=" + fv_no_pizza;
}
if (fv_play_from != undefined) {
    flvplayer_url += "&fv_play_from=" + fv_play_from;
}
if (fv_play_length != undefined) {
    flvplayer_url += "&fv_play_length=" + fv_play_length;
}
if (fv_returnid != undefined) {
    flvplayer_url += "&fv_returnid=" + fv_returnid;
}
if (fv_returnto != undefined) {
    flvplayer_url += "&fv_returnto=" + fv_returnto;
}
if (fv_returnmsg != undefined) {
    flvplayer_url += "&fv_returnmsg=" + fv_returnmsg;
}
if (fv_new_window != undefined) {
    flvplayer_url += "&fv_new_window=" + fv_new_window;
}
if (fv_orientation != undefined) {
    flvplayer_url += "&fv_orientation=" + fv_orientation;
}
if (no_related_video != undefined) {
    flvplayer_url += '&no_related_video=' + no_related_video;
}
if (player_version_xml != undefined) {
    flvplayer_url += "&player_version_xml=" + player_version_xml;
}
if (unps != undefined) {
    flvplayer_url += "&unps=" + unps;
}
if (button_threshold != undefined) {
    flvplayer_url += "&button_threshold=" + button_threshold;
}
if (is_community_thread != undefined) {
    flvplayer_url = flvplayer_url + ("&is_community_thread=" + is_community_thread);
}
if (is_community_video != undefined) {
    flvplayer_url = flvplayer_url + ("&is_community_video=" + is_community_video);
}
if (is_community_member != undefined) {
    flvplayer_url = flvplayer_url + ("&is_community_member=" + is_community_member);
}
if (threadPublic != undefined) {
    flvplayer_url = flvplayer_url + ("&threadPublic=" + threadPublic);
}
if (community_id != undefined) {
    flvplayer_url = flvplayer_url + ("&community_id=" + community_id);
}
if (is_channel != undefined) {
    flvplayer_url = flvplayer_url + ("&is_channel=" + is_channel);
}
if (bgms != undefined) {
    flvplayer_url = flvplayer_url + ("&bgms=" + bgms);
}
if (thumbImage != undefined) {
    flvplayer_url += '&thumbImage=' + thumbImage;
}
if (userSex != undefined) {
    flvplayer_url += '&userSex=' + userSex;
}
if (userAge != undefined) {
    flvplayer_url += '&userAge=' + userAge;
}
if (is_nicowari != undefined) {
    flvplayer_url += '&is_nicowari=' + is_nicowari;
}
if (noMarquee != undefined) {
    flvplayer_url += '&noMarquee=' + noMarquee;
}
if (category != undefined) {
    flvplayer_url += '&category=' + category;
}
if (thumbTitle != undefined) {
    thumbTitle = replaceSentence(thumbTitle, ".php", "");
    flvplayer_url += '&thumbTitle=' + thumbTitle;
}
if (thumbDescription != undefined) {
    thumbDescription = replaceSentence(thumbDescription, ".php", "");
    flvplayer_url += '&thumbDescription=' + thumbDescription;
}
if (useswfversion >= 7) {
    var nico_mcl = new MovieClipLoader();
    var nico_listener = new Object();
    nico_listener.onLoadInit = function(video) {
        video._lockroot = true;
    };
    nico_mcl.addListener(nico_listener);
    nico_mcl.loadClip(flvplayer_url, nico);
} else {
    nico._lockroot = true;
    nico.loadMovie(flvplayer_url);
}
//flvplayerの位置調整
//var fwOffsetY = 30;
//nico._y = -fwOffsetY;
/*
//左上のx,yを指定するバージョン
function createSquareBtn(path,obj_name,label,text_fmt,depth,x,y,w,h,color){
    //path 場所 obj_name 名前 labelボタンにつける文字 text_fmtその文字のtextFormat
    //w,h ボタンのwidth height
    //depth ボタンの深度
    //x,y ボタン左上のx,y座標
    //color 色 16進数 0xffffff
    //path=path obj_name="name"にすると
    //path.btnを指定色で四角に描画して、path.btn.lableをボタン中央に配置する
    var btn = path.createEmptyMovieClip(obj_name, depth);
    createSquare(btn,x,y,w,h,color);
//  if(label != ""){
        btn.createTextField("name",1,0,0,1,1);
        btn.name.type = "dynamic";
        btn.name.border = false;
        btn.name.selectable = false;
        btn.name.background = false;
        btn.name.autoSize = true;
        btn.tabEnabled = false;
        btn.name.text = label;
        btn.name.setTextFormat(text_fmt);
//  }
    btn.onRollOver = function(){
        this._alpha = 60;
    };
    btn.onRollOut = function(){
        this._alpha = 100;
    };
    btn.onReleaseOutside = btn.onRollOut;
}
function createSquare(path,x,y,w,h,color){
    //角がちょっと丸い四角をpathに描画する
    //x,y四角の左上の座標 w,h幅高さ color色
    path._x = x;
    path._y = y;
    w = Math.floor(w/2) * 2;
    h = Math.floor(h/2) * 2;
    path.beginFill(color,100);
    path.moveTo(4,h);
    path.lineTo(w-4,h);
    path.curveTo(w,h,w,h-4);
    path.lineTo(w,4);
    path.curveTo(w,0,w-4,0);
    path.lineTo(4,0);
    path.curveTo(0,0,0,4);
    path.lineTo(0,h-4);
    path.curveTo(0,h,4,h);
    path.endFill();
}
*/

function createSquareBtn(path, obj_name, label, text_fmt, depth, x, y, w, h, color) {
    //path 場所 obj_name 名前 labelボタンにつける文字 text_fmtその文字のtextFormat
    //w,h ボタンのwidth height
    //depth ボタンの深度
    //x,y ボタン中央のx,y座標
    //color 色 16進数 0xffffff
    //path=path obj_name="name"にすると
    //path.btnを指定色で四角に描画して、path.btn.lableをボタン中央に配置する
    var btn = path.createEmptyMovieClip(obj_name, depth);
    createSquare(btn, x, y, w, h, color);
    //  if(label != ""){
    btn.createTextField("name", 1, 0, 0, 1, 1);
    btn.name.type = "dynamic";
    btn.name.border = false;
    btn.name.selectable = false;
    btn.name.background = false;
    btn.name.autoSize = true;
    btn.tabEnabled = false;
    btn.name.text = label;
    btn.name.setTextFormat(text_fmt);
    btn.name._x = 0 - btn.name._width / 2;
    btn.name._y = 0 - btn.name._height / 2;
    //  }
    btn.onRollOver = function() {
        this._alpha = 60;
    };
    btn.onRollOut = function() {
        this._alpha = 100;
    };
    btn.onReleaseOutside = btn.onRollOut;
}

function createSquare(path, x, y, w, h, color) {
    //角がちょっと丸い四角をpathに描画する
    //x,y四角の中央の座標 w,h幅高さ color色
    path._x = x;
    path._y = y;
    w = Math.floor(w / 2) * 2;
    h = Math.floor(h / 2) * 2;
    path.beginFill(color, 100);
    path.moveTo(-w / 2 + 4, h / 2);
    path.lineTo(w / 2 - 4, h / 2);
    path.curveTo(w / 2, h / 2, w / 2, h / 2 - 4);
    path.lineTo(w / 2, -h / 2 + 4);
    path.curveTo(w / 2, -h / 2, w / 2 - 4, -h / 2);
    path.lineTo(-w / 2 + 4, -h / 2);
    path.curveTo(-w / 2, -h / 2, -w / 2, -h / 2 + 4);
    path.lineTo(-w / 2, h / 2 - 4);
    path.curveTo(-w / 2, h / 2, -w / 2 + 4, h / 2);
    path.endFill();
}

function createToggleBtn(path, obj_name, label, text_fmt, depth, x, y, color) {
    //トグルボタン(オンオフ切り替えボタン)
    //path パス obj_name 名前 labelボタンの横のラベル文字 text_fmtその文字のtextFormat
    //depth ボタン深度
    //x,y　ボタンの中央のx,y座標
    //color onボタンの色 16進数 0xffffffとか
    //path=path obj_name="name"にすると
    //path.name.on path.name.off path.name.labelの3つを作成する
    //オンオフ切り替えで_root.nameをtrue or falseに変更するボタン
    //name_so.data.flagにそのbooleanを書き込む
    //別のアクションを行う場合はあとでonReleaseを上書きすること
    var btn = path.createEmptyMovieClip(obj_name, depth);
    btn._x = x;
    btn._y = y;
    var btn_off = btn.createEmptyMovieClip("off", 1);
    var w = 14; //ボタンのサイズ
    btn_off.lineStyle(1, color, 100);
    btn_off.beginFill(0xF0F0F0, 100);
    btn_off.moveTo(-w / 2, w / 2);
    btn_off.lineTo(w / 2, w / 2);
    btn_off.lineTo(w / 2, -w / 2);
    btn_off.lineTo(-w / 2, -w / 2);
    btn_off.lineTo(-w / 2, w / 2);
    btn_off.endFill();
    duplicateMovieClip(btn_off, "on", 2);
    var btn_on = btn.on;
    var w2 = w - 4;
    btn_on.beginFill(color, 100);
    btn_on.moveTo(-w2 / 2, w2 / 2);
    btn_on.lineTo(w2 / 2, w2 / 2);
    btn_on.lineTo(w2 / 2, -w2 / 2);
    btn_on.lineTo(-w2 / 2, -w2 / 2);
    btn_on.lineTo(-w2 / 2, w2 / 2);
    btn_on.endFill();
    btn.createTextField("label", 3, 0, 0, 1, 1);
    var btn_tf = btn.label;
    btn_tf.type = "dynamic";
    btn_tf.border = false;
    btn_tf.background = false;
    btn_tf.selectable = false;
    btn_tf.autoSize = true;
    btn_tf.text = label;
    btn_tf.setTextFormat(text_fmt);
    btn_tf._x = w / 2 + 2;
    btn_tf._y = -btn_tf._height / 2;
    btn_on.onRelease = function() {
        btn_on._visible = false;
        _root[obj_name] = false;
        var so = _root[obj_name + "_so"];
        so.data.flag = false;
        so.flush();
    };
    btn_off.onRelease = function() {
        btn_on._visible = true;
        _root[obj_name] = true;
        var so = _root[obj_name + "_so"];
        so.data.flag = true;
        so.flush();
    };
    btn_off.onRollOver = function() {
        this._alpha = 60;
    };
    btn_off.onRollOut = function() {
        this._alpha = 100;
    };
    btn_off.onReleaseOutside = btn_off.onRollOut;
    btn_on.onRollOver = function() {
        this._alpha = 60;
    };
    btn_on.onRollOut = function() {
        this._alpha = 100;
    };
    btn_on.onReleaseOutside = btn_on.onRollOut;
}
var black12_fmt = new TextFormat();
black12_fmt.font = user_font;
black12_fmt.size = 12;
black12_fmt.bold = false;
black12_fmt.color = 0x000000;
black12_fmt.align = "left";
black12_fmt.rightMargin = 1;
black12_fmt.leftMargin = 1;
var black12b_fmt = new TextFormat();
black12b_fmt.font = user_font;
black12b_fmt.size = 12;
black12b_fmt.bold = true;
black12b_fmt.color = 0x000000;
black12b_fmt.align = "left";
black12b_fmt.rightMargin = 1;
black12b_fmt.leftMargin = 1;
var black14b_fmt = new TextFormat();
black14b_fmt.font = user_font;
black14b_fmt.size = 14;
black14b_fmt.bold = true;
black14b_fmt.color = 0x000000;
black14b_fmt.align = "left";
black14b_fmt.rightMargin = 1;
black14b_fmt.leftMargin = 1;
var red14b_fmt = new TextFormat();
red14b_fmt.font = user_font;
red14b_fmt.size = 14;
red14b_fmt.bold = true;
red14b_fmt.color = 0xFF0000;
red14b_fmt.align = "left";
red14b_fmt.rightMargin = 1;
red14b_fmt.leftMargin = 1;
var white14b_fmt = new TextFormat();
white14b_fmt.font = user_font;
white14b_fmt.size = 14;
white14b_fmt.bold = true;
white14b_fmt.color = 0xffffff;
white14b_fmt.align = "left";
white14b_fmt.rightMargin = 1;
white14b_fmt.leftMargin = 1;
var black10_fmt = new TextFormat();
black10_fmt.font = user_font;
black10_fmt.size = 10;
black10_fmt.bold = false;
black10_fmt.color = 0x000000;
black10_fmt.align = "left";
black10_fmt.rightMargin = 1;
black10_fmt.leftMargin = 1;
var black11_fmt = new TextFormat();
black11_fmt.font = user_font;
black11_fmt.size = 11;
black11_fmt.bold = false;
black11_fmt.color = 0x000000;
black11_fmt.align = "left";
black11_fmt.rightMargin = 1;
black11_fmt.leftMargin = 1;
var white12b_fmt = new TextFormat();
white12b_fmt.font = user_font;
white12b_fmt.size = 12;
white12b_fmt.bold = true;
white12b_fmt.color = 0xFFFFFF;
white12b_fmt.align = "left";
white12b_fmt.rightMargin = 1;
white12b_fmt.leftMargin = 1;
var white10_fmt = new TextFormat();
white10_fmt.font = user_font;
white10_fmt.size = 10;
white10_fmt.bold = false;
white10_fmt.color = 0xFFFFFF;
white10_fmt.align = "left";
white10_fmt.rightMargin = 1;
white10_fmt.leftMargin = 1;
var red10_fmt = new TextFormat();
red10_fmt.font = user_font;
red10_fmt.size = 10;
red10_fmt.bold = false;
red10_fmt.color = 0xFF0000;
red10_fmt.align = "left";
red10_fmt.rightMargin = 1;
red10_fmt.leftMargin = 1;
var red24b_fmt = new TextFormat();
red24b_fmt.font = user_font;
red24b_fmt.size = 24;
red24b_fmt.bold = true;
red24b_fmt.color = 0x26095;
red24b_fmt.align = "left";
red24b_fmt.rightMargin = 1;
red24b_fmt.leftMargin = 1;
//★★★★★★★★★★★背景 -10000★★★★★★★★★★★
createEmptyMovieClip("bg", -10000);
bg.beginFill(0x000000, 100);
bg.moveTo(0, 0);
bg.lineTo(0, 30);
bg.lineTo(30, 30);
bg.lineTo(30, 0);
bg.lineTo(0, 0);
bg.endFill();
//bg._visible = false;
//★★★★★★★★★★★上のバー 2★★★★★★★★★★★
main_bar.swapDepths(2);
main_bar.base.swapDepths(1);
main_bar.base.onRelease = function() {
    if (use_swf_version >= 8 && key_operation) {
        System.IME.setEnabled(false); // IMEをオフにする
    }
    if (quick_ngid_mode && loglist_menu.add_id._visible) {
        var xm = main_bar._xmouse;
        if (xm > main_bar.main_info._x && xm < main_bar.main_info._x + main_bar.main_info._width) {
            var ym = main_bar._ymouse;
            if (ym > main_bar.main_info._y && ym < main_bar.main_info._y + main_bar.main_info._height) {
                loglist_menu.add_id._visible = false;
                cand_ng_id = deleteRepField(cand_ng_id, "user_id", false);
                updateFilter("add_id");
            }
        }
    }
};
//main_bar.icon_local.swapDepths(2);
//main_bar.icon_local._visible=false;
//フィルター情報表示テキストフィールド 3-6
main_bar.createEmptyMovieClip("auto_comment_get_icon", 3);
createSquare(main_bar.auto_comment_get_icon, 160, 17, 36, 28, 0x909090);
//createSquareBtn(main_bar,"auto_comment_get_icon","",white10_fmt,3,163,20+21,40,10,0x505050);
main_bar.auto_comment_get_icon._alpha = 0; //コメント数の自動受信アイコン
main_bar.auto_comment_get_icon.onRollOver = function() {
    this._alpha = 60;
};
main_bar.auto_comment_get_icon.onRollOut = function() {
    this._alpha = 0;
};
main_bar.auto_comment_get_icon.onRelease = function() {
    auto_comment_get = !auto_comment_get;
    showFilterInfo(main_bar.filter_info1.text, main_bar.filter_info2.text);
    if (auto_comment_get) {
        clearInterval(nico.ThreadIntervalID);
        var interval = nico.HTTP_INTERVAL_SHORT_ECONOMY;
        if (nico.PremiumFlag == 1) {
            interval = nico.HTTP_INTERVAL_SHORT;
        }
        nico.ThreadIntervalID = setInterval(nico.onThreadInterval, interval);
        nico.ThreadIntervalShort = true;
        auto_comment_get_so.data.flag = true;
    } else {
        auto_comment_get_so.data.flag = false;
    }
    auto_comment_get_so.flush();
};
main_bar.auto_comment_get_icon.onReleaseOutside = main_bar.auto_comment_get_icon.onRollOut;
main_bar.createTextField("filter_info1", 4, 112, -1, 1, 1);
main_bar.filter_info1.type = "dynamic";
main_bar.filter_info1.border = false;
main_bar.filter_info1.selectable = false;
main_bar.filter_info1.background = false;
main_bar.filter_info1.autoSize = true;
main_bar.createTextField("filter_info2", 5, 112, 13, 1, 1);
main_bar.filter_info2.type = "dynamic";
main_bar.filter_info2.selectable = false;
main_bar.filter_info2.border = false;
main_bar.filter_info2.background = false;
main_bar.filter_info2.autoSize = true;
main_bar.createEmptyMovieClip("filter_info_line", 6);
showFilterInfo(0, 0);

function showFilterInfo(num1, num2) {
    if (auto_comment_get) {
        var fmt = black14b_fmt;
    } else {
        var fmt = red14b_fmt;
    }
    main_bar.filter_info1.text = num1;
    main_bar.filter_info1.setTextFormat(fmt);
    main_bar.filter_info1._x = 157 - main_bar.filter_info1.textWidth / 2;
    main_bar.filter_info2.text = num2;
    main_bar.filter_info2.setTextFormat(fmt);
    main_bar.filter_info2._x = 157 - main_bar.filter_info2.textWidth / 2;
    drawFilterInfoLine(fmt.color);
}

function drawFilterInfoLine(color) {
    if (main_bar.filter_info_line != undefined) {
        main_bar.filter_info_line.removeMovieClip(); //一応消しとく
    }
    main_bar.createEmptyMovieClip("filter_info_line", 6);
    main_bar.filter_info_line.lineStyle(2, color, 100);
    main_bar.filter_info_line.moveTo(-15, 0);
    main_bar.filter_info_line.lineTo(15, 0);
    main_bar.filter_info_line._x = 160;
    main_bar.filter_info_line._y = 16;
}
//メイン情報表示テキストフィールド 7
main_bar.createTextField("main_info", 7, 182, 7, 290, 19);
main_bar.main_info.type = "dynamic";
main_bar.main_info.border = false;
main_bar.main_info.selectable = false;
main_bar.main_info.background = false;
main_bar.main_info.autoSize = false;
main_bar.main_info.setTextFormat(black12_fmt);
//自動コメント収集アイコン 8-9
createSquareBtn(main_bar, "auto_comment_icon", "C", white12b_fmt, 8, 717, 16, 16, 16, 0x303030);
if (!auto_comment_post) {
    main_bar.auto_comment_icon._visible = false;
}
main_bar.auto_comment_icon.onRelease = function() {
    if (auto_comment_status == "ready" && wv == undefined) {
        sendLocalXML();
    }
};
//フィルター1 11
createSquareBtn(main_bar, "filter1", filter1_name.charAt(0), white12b_fmt, 11, 15, 16, 20, 28, 0x303030);
main_bar.filter1.name._y += 4;
if (filter1_on) {
    main_bar.filter1._alpha = 40;
} else {
    main_bar.filter1._alpha = 100;
}
main_bar.filter1.createTextField("count", 2, 0, 0, 1, 1);
main_bar.filter1.count.type = "dynamic";
main_bar.filter1.count.border = false;
main_bar.filter1.count.background = false;
main_bar.filter1.count.selectable = false;
main_bar.filter1.count.autoSize = true;
main_bar.filter1.count.text = 0;
main_bar.filter1.count.setTextFormat(white10_fmt);
main_bar.filter1.count._x = 0 - main_bar.filter1.count._width / 2;
main_bar.filter1.count._y = -17;
main_bar.filter1.onRelease = function() {
    if (!filter1_on) {
        updateFilter("add_filter", 1);
        this._alpha = 40;
    }
};
main_bar.filter1.onRollOver = function() {
    if (!filter1_on) {
        this._alpha = 60;
    }
};
main_bar.filter1.onRollOut = function() {
    if (!filter1_on) {
        this._alpha = 100;
    }
};
main_bar.filter1.onReleaseOutside = main_bar.filter1.onRollOut;
//フィルター2 14
createSquareBtn(main_bar, "filter2", filter2_name.charAt(0), white12b_fmt, 14, 37, 16, 20, 28, 0x303030);
main_bar.filter2.name._y += 4;
if (filter2_on) {
    main_bar.filter2._alpha = 40;
} else {
    main_bar.filter2._alpha = 100;
}
main_bar.filter2.createTextField("count", 2, 0, 0, 1, 1);
main_bar.filter2.count.type = "dynamic";
main_bar.filter2.count.border = false;
main_bar.filter2.count.background = false;
main_bar.filter2.count.selectable = false;
main_bar.filter2.count.autoSize = true;
main_bar.filter2.count.text = 0;
main_bar.filter2.count.setTextFormat(white10_fmt);
main_bar.filter2.count._x = 0 - main_bar.filter2.count._width / 2;
main_bar.filter2.count._y = -17;
main_bar.filter2.onRelease = function() {
    if (!filter2_on) {
        updateFilter("add_filter", 2);
        this._alpha = 40;
    }
};
main_bar.filter2.onRollOver = function() {
    if (!filter2_on) {
        this._alpha = 60;
    }
};
main_bar.filter2.onRollOut = function() {
    if (!filter2_on) {
        this._alpha = 100;
    }
};
main_bar.filter2.onReleaseOutside = main_bar.filter2.onRollOut;
//フィルター3 17
createSquareBtn(main_bar, "filter3", filter3_name.charAt(0), white12b_fmt, 17, 59, 16, 20, 28, 0x303030);
main_bar.filter3.name._y += 4;
if (filter3_on) {
    main_bar.filter3._alpha = 40;
} else {
    main_bar.filter3._alpha = 100;
}
main_bar.filter3.createTextField("count", 2, 0, 0, 1, 1);
main_bar.filter3.count.type = "dynamic";
main_bar.filter3.count.border = false;
main_bar.filter3.count.background = false;
main_bar.filter3.count.selectable = false;
main_bar.filter3.count.autoSize = true;
main_bar.filter3.count.text = 0;
main_bar.filter3.count.setTextFormat(white10_fmt);
main_bar.filter3.count._x = 0 - main_bar.filter3.count._width / 2;
main_bar.filter3.count._y = -17;
main_bar.filter3.onRelease = function() {
    if (!filter3_on) {
        updateFilter("add_filter", 3);
        this._alpha = 40;
    }
};
main_bar.filter3.onRollOver = function() {
    if (!filter3_on) {
        this._alpha = 60;
    }
};
main_bar.filter3.onRollOut = function() {
    if (!filter3_on) {
        this._alpha = 100;
    }
};
main_bar.filter3.onReleaseOutside = main_bar.filter3.onRollOut;
//フィルター4 20
createSquareBtn(main_bar, "filter4", filter4_name.charAt(0), white12b_fmt, 20, 81, 16, 20, 28, 0x303030);
main_bar.filter4.name._y += 4;
if (filter4_on) {
    main_bar.filter4._alpha = 40;
} else {
    main_bar.filter4._alpha = 100;
}
main_bar.filter4.createTextField("count", 2, 0, 0, 1, 1);
main_bar.filter4.count.type = "dynamic";
main_bar.filter4.count.border = false;
main_bar.filter4.count.background = false;
main_bar.filter4.count.selectable = false;
main_bar.filter4.count.autoSize = true;
main_bar.filter4.count.text = 0;
main_bar.filter4.count.setTextFormat(white10_fmt);
main_bar.filter4.count._x = 0 - main_bar.filter4.count._width / 2;
main_bar.filter4.count._y = -17;
main_bar.filter4.onRelease = function() {
    if (!filter4_on) {
        updateFilter("add_filter", 4);
        this._alpha = 40;
    }
};
main_bar.filter4.onRollOver = function() {
    if (!filter4_on) {
        this._alpha = 60;
    }
};
main_bar.filter4.onRollOut = function() {
    if (!filter4_on) {
        this._alpha = 100;
    }
};
main_bar.filter4.onReleaseOutside = main_bar.filter4.onRollOut;
//filter5(NGID) 23
createSquareBtn(main_bar, "filter5", "ID", white12b_fmt, 23, 103, 16, 20, 28, 0x303030);
main_bar.filter5.name._y += 4;
if (filter5_on) {
    main_bar.filter5._alpha = 40;
} else {
    main_bar.filter5._alpha = 100;
}
main_bar.filter5.createTextField("count", 25, 0, 0, 1, 1);
main_bar.filter5.count.type = "dynamic";
main_bar.filter5.count.border = false;
main_bar.filter5.count.background = false;
main_bar.filter5.count.selectable = false;
main_bar.filter5.count.autoSize = true;
main_bar.filter5.count.text = 0;
main_bar.filter5.count.setTextFormat(white10_fmt);
main_bar.filter5.count._x = 0 - main_bar.filter5.count._width / 2;
main_bar.filter5.count._y = -17;
main_bar.filter5.onRelease = function() {
    if (!filter5_on) {
        updateFilter("add_filter", 5);
        this._alpha = 40;
    }
};
main_bar.filter5.onRollOver = function() {
    if (!filter5_on) {
        this._alpha = 60;
    }
};
main_bar.filter5.onRollOut = function() {
    if (!filter5_on) {
        this._alpha = 100;
    }
};
main_bar.filter5.onReleaseOutside = main_bar.filter5.onRollOut;
//フィルター解除 26
createSquareBtn(main_bar, "filter_off", "", undefined, 26, 125, 20, 20, 20, 0x303030);
main_bar.filter_off.lineStyle(2, 0xFFFFFF, 100);
main_bar.filter_off.moveTo(10 - 3, 10 - 3);
main_bar.filter_off.lineTo(-10 + 3, -10 + 3);
main_bar.filter_off.moveTo(-10 + 3, 10 - 3);
main_bar.filter_off.lineTo(10 - 3, -10 + 3);
main_bar.filter_off.onRelease = function() {
    var key_flag;
    if (ngid_off_key_code == 0) {
        key_flag = true;
    } else {
        key_flag = Key.isDown(ngid_off_key_code);
    }
    if (filter1_on || filter2_on || filter3_on || filter4_on || (filter5_on && key_flag)) {
        main_bar.filter1._alpha = 100;
        main_bar.filter2._alpha = 100;
        main_bar.filter3._alpha = 100;
        main_bar.filter4._alpha = 100;
        if (key_flag) {
            main_bar.filter5._alpha = 100;
        }
        updateFilter("clear_filter");
    }
};
//ダウンロード 35
createSquareBtn(main_bar, "download", "DL", white12b_fmt, 35, design.btn_dl.x[design_mode], 16, 30, 24, 0x303030);
main_bar.download.onRelease = function() {
    if (flash_version < 10) {
        if (use_javascript && check_title_status == "waiting") {
            check_title_status = "loading";
            checkTitle();
        } else {
            downloadFLV();
        }
    } else {
        if (!file_name) {
            check_title_status = "loading";
            JS_getTitle();
            if (video_title.length > 0) {
                delete this.onEnterFrame;
                if (nico.o.url.substr(nico.o.url.length - 3, 3) == 'low') {
                    if (nico.input_term > 0) {
                        video_title += '（試聴モード）';
                    } else {
                        video_title += '（エコノミーモード）';
                    }
                }
                file_name = video_title;
                for (var i = 0; i < file_name.length; i++) {
                    var c = file_name.charAt(i);
                    if (c != ' ' && c != '　' && c != '\t' && c != '\r' && c != '\n') {
                        break;
                    }
                }
                for (var j = file_name.length - 1; j >= 0; j--) {
                    var c = file_name.charAt(j);
                    if (c != ' ' && c != '　' && c != '\t' && c != '\r' && c != '\n') {
                        break;
                    }
                }
                file_name = file_name.substring(i, j + 1);
                file_name = replaceSentence(file_name, '?', '？');
                file_name = replaceSentence(file_name, '"', '”');
                file_name = replaceSentence(file_name, '/', '／');
                file_name = replaceSentence(file_name, '\\\\', '￥');
                file_name = replaceSentence(file_name, '<', '＜');
                file_name = replaceSentence(file_name, '>', '＞');
                file_name = replaceSentence(file_name, '*', '＊');
                file_name = replaceSentence(file_name, '|', '｜');
                file_name = replaceSentence(file_name, ':', '：');
                file_name = replaceSentence(file_name, ',', '，');
                file_name = replaceSentence(file_name, ';', '；');
                check_title_status = "ready";
                /*
                    if (copy_title) {
                        if (video_title.length > 0) {
                            System.setClipboard(video_title);
                            showInfoOnMainBar("動画タイトルをコピーしました");
                        } else if (use_javascript) {
                            showInfoOnMainBar("動画タイトルを取得できませんでした");
                        }
                    }*/
                downloadFLV();
            }
        } else { //ver 10でfile_nameを持ってる
            downloadFLV();
        }
    }
    this._alpha = 40;
};
//設定メニュー 37
createSquareBtn(main_bar, "pref_menu", "設定", white12b_fmt, 37, design.btn_conf.x[design_mode], 16, 40, 24, 0x303030);
main_bar.pref_menu.onRelease = function() {
    if (pref_menu._visible) {
        closePrefMenu();
    } else {
        openPrefMenu();
        goTopDepth(pref_menu);
    }
    this._alpha = 40;
};
//NGID詳細 33
createSquareBtn(main_bar, "ngid_view", "NGID", white12b_fmt, 33, design.btn_ngid.x[design_mode], 16, 40, 24, 0x303030);
main_bar.ngid_view.onRelease = function() {
    if (ngid_menu._visible) {
        updateNGIDMenu("close");
    } else {
        updateNGIDMenu("ng_ids");
        goTopDepth(ngid_menu);
    }
    this._alpha = 40;
};
if (apply_kakikomi) {
    //kakikomi詳細 34
    createSquareBtn(main_bar, "kakikomi_view", "ｶｷｺﾐ", white12b_fmt, 34, design.btn_kaki.x[design_mode], 16, 40, 24, 0x303030);
    main_bar.kakikomi_view.onRelease = function() {
        if (kakikomi_menu._visible) {
            updateKakikomiMenu("close");
        } else {
            updateKakikomiMenu("kaki_txt");
            goTopDepth(kakikomi_menu);
        }
        this._alpha = 40;
    };
}
//過去ログでのボタン 45
createSquareBtn(hide_bar, "wayback_tab_reg", "投稿日時", white12b_fmt, 200, 875, -365, 60, 24, 0x303030);
hide_bar.wayback_tab_reg._visible = false;
hide_bar.wayback_tab_reg.onRelease = function() {
    //_dump(nico.tabmenu.wayback_menu.wayback_hour);
    nico.tabmenu.wayback_menu.wayback_date.selectedDate = nico.tabmenu.wayback_menu.wayback_date.selectableRange.rangeStart;
    nico.tabmenu.wayback_menu.wayback_hour.value = nico.ThreadCreateDate.getHours();
    nico.tabmenu.wayback_menu.wayback_min.value = nico.ThreadCreateDate.getMinutes();
    //  nico.tabmenu.wayback_menu.wayback_date.selectedDate = nico.tabmenu.wayback_menu.wayback_date.selectableRange.rangeStart;
    //  nico.tabmenu.wayback_menu.wayback_date.selectedDate.setTime(nico.tabmenu.wayback_menu.wayback_date.selectedDate.getTime() + (7 * 24 * 3600 * 1000));
};
//リンクボタン 40
createSquareBtn(main_bar, "link", "LINK", white12b_fmt, 40, design.btn_link.x[design_mode], 16, 40, 24, 0x303030);
//main_bar.link._visible = false;
main_bar.link.onRelease = function() {
    //タグ及びマイリストからリンクを検索
    if (use_javascript && check_html_status == "waiting") {
        check_html_status = "loading";
        checkHTML();
    }
    if (link_thumb._visible) {
        link_thumb._visible = false;
    } else {
        //this._visible = false;
        link_thumb._visible = true;
        goTopDepth(link_thumb);
    }
    this._alpha = 40;
};
//自動コメント収集情報 50
main_bar.createTextField("auto_comment_info1", 50, 618, 0, 1, 1);
main_bar.auto_comment_info1.type = "dynamic";
main_bar.auto_comment_info1.border = false;
main_bar.auto_comment_info1.selectable = false;
main_bar.auto_comment_info1.background = false;
main_bar.auto_comment_info1.autoSize = true;
main_bar.auto_comment_info1.setTextFormat(black14b_fmt);
main_bar.createTextField("auto_comment_info2", 51, 618, 14, 1, 1);
main_bar.auto_comment_info2.type = "dynamic";
main_bar.auto_comment_info2.border = false;
main_bar.auto_comment_info2.selectable = false;
main_bar.auto_comment_info2.background = false;
main_bar.auto_comment_info2.autoSize = true;
main_bar.auto_comment_info2.setTextFormat(black14b_fmt);
main_bar.auto_comment_info2._x = 300 - main_bar.auto_comment_info2.textWidth / 2;
main_bar.createEmptyMovieClip("auto_comment_info_line", 52);
main_bar.auto_comment_info_line.lineStyle(2, 0x000000, 100);
main_bar.auto_comment_info_line.moveTo(-18, 0);
main_bar.auto_comment_info_line.lineTo(18, 0);
main_bar.auto_comment_info_line._x = 682;
main_bar.auto_comment_info_line._y = 17;
main_bar.auto_comment_info_line._visible = false;
//★★★★★★★★★★★ヘッダ 3～★★★★★★★★★★★
header.swapDepths(3);
header.base.swapDepths(1);
header.icon_local.swapDepths(5);
header.icon_narrow.swapDepths(6);
header.icon_premium.swapDepths(7);
header.icon_cm.swapDepths(8);
header.icon_mymemory.swapDepths(9);
header.icon_edit.swapDepths(10);
header.icon_hiroba.swapDepths(11);
header.icon_buttonok.swapDepths(12);
//各アイコンを非表示に
header.icon_local._visible = false;
header.icon_narrow._visible = false;
header.icon_premium._visible = false;
header.icon_cm._visible = false;
if (!mm) {
    header.icon_mymemory._visible = false;
}
if (!e && !owner_thread_edit_mode) {
    header.icon_edit._visible = false;
}
header.icon_hiroba._visible = false;
header.icon_buttonok._visible = false;
//再生数・コメント数・マイリスト数
var counter_fmt = new TextFormat();
counter_fmt.font = "ＭＳ Ｐゴシック";
counter_fmt.size = 15;
counter_fmt.bold = true;
counter_fmt.color = 0x333333;
counter_fmt.align = "left";
counter_fmt.rightMargin = 0;
counter_fmt.leftMargin = 0;
header.createTextField("Members", 20, 71, 0, 1, 1);
header.Members.type = "dynamic";
header.Members.border = false;
header.Members.selectable = false;
header.Members.autoSize = true;
header.Members.wordWrap = false;
header.Members.text = "";
header.Members.setTextFormat(counter_fmt);
header.createTextField("Comments", 21, 71, 16, 1, 1);
header.Comments.type = "dynamic";
header.Comments.border = false;
header.Comments.selectable = false;
header.Comments.autoSize = true;
header.Comments.wordWrap = false;
header.Comments.text = "";
header.Comments.setTextFormat(counter_fmt);
header.createTextField("MyLists", 22, 71, 32, 1, 1);
header.MyLists.type = "dynamic";
header.MyLists.border = false;
header.MyLists.selectable = false;
header.MyLists.autoSize = true;
header.MyLists.wordWrap = false;
header.MyLists.text = "";
header.MyLists.setTextFormat(counter_fmt);
//時計
header.clock.swapDepths(30);
header.clock.onPress = function() {
    if (Key.isDown(1)) {
        var xm = header.clock._xmouse;
        var ym = header.clock._ymouse;
        if (xm > 0 && xm < 100 && autopop_cm && design_mode == 0) {
            if (autopop_mode) {
                Hide_marquee();
            } else {
                Show_marquee();
            }
        } else {
            // "CM表示中"でクリック時は元のモードに
            if (pre_clock_mode != undefined) {
                clock_mode = pre_clock_mode;
                pre_clock_mode = undefined;
            } else {
                clock_mode++;
                if (clock_mode > 1) {
                    clock_mode = 0;
                }
                showClockInfo(clock_mode);
                clock_mode_so.data.number = clock_mode;
                clock_mode_so.flush();
            }
        }
    }
};
header.clock.onRollOver = function() {
    mouse_on_clock = true;
    if (autopop_cm && design_mode == 0) {
        header.clock.marquee_change._visible = true;
    }
};
header.clock.onRollOut = function() {
    mouse_on_clock = false;
    if (autopop_cm && design_mode == 0) {
        header.clock.marquee_change._visible = false;
    }
};
header.clock.createTextField("marquee_change", 1, 0, 15, 1, 1);
header.clock.marquee_change.type = "dynamic";
header.clock.marquee_change.border = true;
header.clock.marquee_change.background = true;
header.clock.marquee_change.autoSize = true;
header.clock.marquee_change.selectable = false;
header.clock.marquee_change._visible = false;
header.clock.marquee_change.text = "左側クリックでマーキー切り替え";
header.clock.marquee_change.setTextFormat(black12_fmt);
var clock_fmt = new TextFormat();
header.clock.createTextField("clockText", 2, 29, 0, 1, 1);
header.clock.clockText.type = "dynamic";
header.clock.clockText.border = false;
header.clock.clockText.selectable = false;
header.clock.clockText.autoSize = true;
header.clock.clockText.wordWrap = false;
header.clock.clockText.text = "";
//時計に表示する情報
var clock_info = new Array();
clock_info.movie_type = "";
clock_info.movie_resolution = "";
clock_info.movie_framerate = "";
clock_info.movie_datarate = "";
function showClockInfo(mode) {
    var text = "";
    if (mode == 0) {
        text = nico.header.movieInfoBar.clock.clockText.text;
    } else if (mode == 1) {
        var delimiter = "  ";
        if (clock_info.movie_type != "") text += clock_info.movie_type;
        if (clock_info.movie_resolution != "") {
            if (text != "") text += delimiter;
            text += clock_info.movie_resolution;
        }
        if (clock_info.movie_framerate != "") {
            if (text != "") text += delimiter;
            text += clock_info.movie_framerate;
        }
        if (clock_info.movie_datarate != "") {
            if (text != "") text += delimiter;
            text += clock_info.movie_datarate;
        }
    } else if (mode == 2) {
        text = nico.CM_text.text;
    }
    header.clock.clockText.text = text;
    header.clock.clockText._x = 98 - header.clock.clockText.textWidth / 2;
}
//★★★★★★★★★★★下の枠線 90～★★★★★★★★★★★
bottom_line.swapDepths(90);
bottom_line.base.swapDepths(1);
bottom_line._visible = false;
//★★★★★★★★★★★スクリーン 100～★★★★★★★★★★★
screen.swapDepths(100);
//スクリーン情報テキストフィールド
screen.createTextField("wrapper_info", 101, 0, 15, 1, 1);
screen.wrapper_info.type = "dynamic";
screen.wrapper_info.border = false;
screen.wrapper_info.background = false;
screen.wrapper_info.autoSize = true;
screen.wrapper_info.selectable = false;
screen.wrapper_info._visible = false;
screen.wrapper_info.setTextFormat(red24b_fmt);
//スクリーンのマウスの下に位置しているコメントのIDを探す

function searchID() {
    var result_id = -1;
    var xm = nico.videowindow._xmouse;
    var ym = nico.videowindow._ymouse;
    var Slot;
    //コメント非表示時は探さない
    if (!nico.controller.controller_submenu.OverlayOff._visible) {
        return result_id;
    }
    //通常コメント、ニコスコメントから探す
    Slot = nico.MessageSlots;
    for (var i = 0, l = Slot.length; i < l; i++) { //どのMessageSlotsをクリックしたのか調べるiループ
        var slot_text = Slot[i]._text;
        if (slot_text.text != "") {
            var x = slot_text._x;
            var y = slot_text._y;
            var w = slot_text._width;
            var h = slot_text._height;
            if (x < xm && x + w > xm && y < ym && y + h > ym) { //どのMessageSlotsか分かった
                //var result_num = binarySearch(fwMessages,"_no",Slot[i]._message._no);
                //result_id = fwMessages[result_num].user_id;
                result_id = Slot[i]._message._user;
                if (copy_to_clip_board && copy_message_to_clip_board) {
                    System.setClipboard(result_id + ' ' + slot_text.text);
                } else if (copy_to_clip_board) {
                    System.setClipboard(result_id);
                } else if (copy_message_to_clip_board) {
                    System.setClipboard(slot_text.text);
                }
                return result_id;
            }
        }
    }
    //投稿者コメントから探す
    if (nico.MessageSlots_ownerthread) {
        Slot = nico.MessageSlots_ownerthread;
        for (var i = 0, l = Slot.length; i < l; i++) { //どのMessageSlotsをクリックしたのか調べるiループ
            var slot_text = Slot[i]._text;
            if (slot_text.text != "") {
                var x = slot_text._x;
                var y = slot_text._y;
                var w = slot_text._width;
                var h = slot_text._height;
                if (x < xm && x + w > xm && y < ym && y + h > ym) { //どのMessageSlotsか分かった
                    //var result_num = binarySearch(fwMessages_ownerthread,"_no",Slot[i]._message._no);
                    //result_id = fwMessages_ownerthread[result_num].user_id;
                    result_id = Slot[i]._message._user;
                    if (copy_to_clip_board && copy_message_to_clip_board) {
                        System.setClipboard(result_id + ' ' + slot_text.text);
                    } else if (copy_to_clip_board) {
                        System.setClipboard(result_id);
                    } else if (copy_message_to_clip_board) {
                        System.setClipboard(slot_text.text);
                    }
                    return result_id;
                }
            }
        }
    }
    if (nico.MessageSlots_community) {
        Slot = nico.MessageSlots_community;
        for (var i = 0, l = Slot.length; i < l; i++) { //どのMessageSlotsをクリックしたのか調べるiループ
            var slot_text = Slot[i]._text;
            if (slot_text.text != "") {
                var x = slot_text._x;
                var y = slot_text._y;
                var w = slot_text._width;
                var h = slot_text._height;
                if (x < xm && x + w > xm && y < ym && y + h > ym) { //どのMessageSlotsか分かった
                    //var result_num = binarySearch(fwMessages_community,"_no",Slot[i]._message._no);
                    //result_id = fwMessages_community[result_num].user_id;
                    if (copy_message_to_clip_board) {
                        System.setClipboard(slot_text.text);
                    }
                }
            }
        }
    }
    return result_id;
}
//指定IDを強調表示する
//idにマイナス渡すと全解除

function emphID(id) {
    //とりあえずSlotsの枠を全部はずす
    clearEmphMes("MessageSlots");
    if (id == undefined || id < 0) { //idがない場合は全解除
        //if(list_mode != "normal"){}
        if (cand_ng_id.length > 0) {
            showInfoOnMainBar("強調表示を解除しました");
        } else if (!nico.videowindow.playButton._visible) {
            if (click_pause) {
                nico.player.pause();
            }
        } else {
            nico.videowindow.playButton.onRelease();
        }
        //if(list_mode != "normal"){updateLogList("clear");}
        cand_ng_id = new Array();
        clearEmphMes("Messages");
    } else {
        cand_ng_id = new Array();
        var slot;
        var msgs;
        var raw_msgs;
        //通常コメントから探してcand_ng_idに追加
        slot = nico.MessageSlots;
        msgs = nico.Messages;
        raw_msgs = fwMessages;
        for (var i = 0, l = raw_msgs.length; i < l; i++) {
            if (raw_msgs[i].user_id != id) { //同一ID以外のコメントなら
                msgs[i]._mine = false; //Messagesの枠外す
            } else { //同一ID発見
                //cand_ng_idに追加していく
                cand_ng_id.push({
                    user_id: id,
                    date: 0,
                    message: raw_msgs[i]._message,
                    vpos: raw_msgs[i]._vpos,
                    no: raw_msgs[i].no,
                    msgs: 'current'
                });
                msgs[i]._mine = true; //Messagesに枠つける
                if (msgs[i]._slot != undefined) { //表示中のコメントならSlotsにも枠つける
                    slot[msgs[i]._slot]._text.border = true;
                    slot[msgs[i]._slot]._text.borderColor = 0xffff00;
                }
            }
        }
        //ニコスコメントから探してcand_ng_idに追加
        msgs = nico.Messages_Nicos;
        raw_msgs = fwMessages_Nicos;
        for (var i = 0, l = raw_msgs.length; i < l; i++) {
            if (raw_msgs[i].user_id != id) { //同一ID以外のコメントなら
                msgs[i]._mine = false; //Messagesの枠外す
            } else { //同一ID発見
                //cand_ng_idに追加していく
                cand_ng_id.push({
                    user_id: id,
                    date: 0,
                    message: raw_msgs[i]._message,
                    vpos: raw_msgs[i]._vpos,
                    no: raw_msgs[i].no,
                    msgs: 'nicos'
                });
                msgs[i]._mine = true; //Messagesに枠つける
                if (msgs[i]._slot != undefined) { //表示中のコメントならSlotsにも枠つける
                    slot[msgs[i]._slot]._text.border = true;
                    slot[msgs[i]._slot]._text.borderColor = 0x00ff00; //ニコスコメントは緑
                }
            }
        }
        //ローカルコメントから探してcand_ng_idに追加
        msgs = nico.Messages_Local;
        for (var i = 0, l = msgs.length; i < l; i++) {
            if (msgs[i]._user != id) { //同一ID以外のコメントなら
                msgs[i]._mine = false; //Messagesの枠外す
            } else { //同一ID発見
                //cand_ng_idに追加していく
                //
                cand_ng_id.push({
                    user_id: id,
                    date: 0,
                    message: msgs[i]._message,
                    vpos: msgs[i]._vpos,
                    no: i,
                    msgs: 'local'
                });
                msgs[i]._mine = true; //Messagesに枠つける
                if (msgs[i]._slot != undefined) { //表示中のコメントならSlotsにも枠つける
                    slot[msgs[i]._slot]._text.border = true;
                    slot[msgs[i]._slot]._text.borderColor = 0x0000ff; //ローカルコメントは青
                }
            }
        }
        //投稿者コメントから探してcand_ng_idに追加
        slot = nico.MessageSlots_ownerthread;
        msgs = nico.Messages_ownerthread;
        raw_msgs = fwMessages_ownerthread;
        for (var i = 0, l = raw_msgs.length; i < l; i++) {
            if (raw_msgs[i].user_id != id) { //同一ID以外のコメントなら
                msgs[i]._mine = false; //Messagesの枠外す
            } else { //同一ID発見
                //cand_ng_idに追加していく
                cand_ng_id.push({
                    user_id: id,
                    date: 0,
                    message: raw_msgs[i]._message,
                    vpos: raw_msgs[i]._vpos,
                    no: raw_msgs[i].no,
                    msgs: 'game'
                });
                msgs[i]._mine = true; //Messagesに枠つける
                if (msgs[i]._slot != undefined) { //表示中のコメントならSlotsにも枠つける
                    slot[msgs[i]._slot]._text.border = true;
                    slot[msgs[i]._slot]._text.borderColor = 0xffff00;
                }
            }
        }
        if (cand_ng_id.length > 0) {
            var name = id;
            var comment_message = "[" + name.substr(0, id_length) + "] さんのコメント  " + cand_ng_id.length + " 件";
            showInfoOnMainBar(comment_message);
        }
    }
}
function clearEmphMes(mode) {
    if (mode == "MessageSlots" || mode == "both") {
        var Slot = nico.MessageSlots;
        for (var i = 0, l = Slot.length; i < l; i++) {
            Slot[i]._text.border = false;
        }
        if (nico.MessageSlots_ownerthread) {
            Slot = nico.MessageSlots_ownerthread;
            for (var i = 0, l = Slot.length; i < l; i++) {
                Slot[i]._text.border = false;
            }
        }
    }
    if (mode == "Messages" || mode == "both") {
        var Mes = nico.Messages;
        for (var i = 0, l = Mes.length; i < l; i++) {
            Mes[i]._mine = false;
        }
        if (nico.MessageSlots_ownerthread) {
            Mes = nico.Messages_ownerthread;
            for (var i = 0, l = Mes.length; i < l; i++) {
                Mes[i]._mine = false;
            }
        }
    }
}
//★★★★★★★★★★★★★NGID確認メニュー(21000) ★★★★★★★★★★★★★
//自前でスクロールバーとか一式作るとどうなるんだろうかという実験
ngid_menu.swapDepths(21000);
ngid_menu._visible = false;
ngid_menu.base.onPress = function() {
    var xm = ngid_menu._xmouse;
    var ym = ngid_menu._ymouse;
    if (xm > 0 && xm < 369 && ym > 0 && ym < 25) {
        ngid_menu.startDrag();
    }
    goTopDepth(ngid_menu);
};
ngid_menu.base.onRelease = function() {
    var xm = ngid_menu._xmouse;
    var ym = ngid_menu._ymouse;
    if (xm > 370 && xm < 395 && ym > 0 && ym < 25) {
        updateNGIDMenu("close");
    } else {
        ngid_menu.stopDrag("");
    }
};
ngid_menu.base.onReleaseOutside = ngid_menu.base.onRelease;
if ((VIDEO.substr(0, 2) == "sm" || VIDEO.substr(0, 2) == "nm") && ngid_menu_bg_alpha > 0) {
    ngid_menu.createEmptyMovieClip("bg", 201);
    if (useswfversion >= 7) {
        var bg_mcl = new MovieClipLoader();
        bg_mcl.loadClip(thumbImage, ngid_menu.bg);
    } else {
        ngid_menu.bg.loadMovie(thumbImage);
    }
}
ngid_menu.createTextField("info", 202, 0, 5, 1, 1);
ngid_menu.info.type = "dynamic";
ngid_menu.info.selectable = false;
ngid_menu.info.border = false;
ngid_menu.info.background = false;
ngid_menu.info.autoSize = true;
ngid_menu.createTextField("header", 205, 20, 31, 1, 1);
ngid_menu.header.type = "dynamic";
ngid_menu.header.selectable = false;
ngid_menu.header.border = false;
ngid_menu.header.background = false;
ngid_menu.header.autoSize = true;
ngid_menu.createTextField("mes", 206, 10, 52, 380, 260);
ngid_menu.mes.type = "dynamic";
ngid_menu.mes.border = true;
ngid_menu.mes.background = false;
ngid_menu.mes.autoSize = false;
ngid_menu.mes.wordWrap = false;
ngid_menu.mes.multiline = true;
ngid_menu.mes.mouseWheelEnabled = false;
//スクロールバー
ngid_menu.createEmptyMovieClip("slider_bar", 209);
//          var x = ngid_menu.mes._x + ngid_menu.mes._width - 18
//          var y = ngid_menu.mes._y
ngid_menu.slider_bar._x = ngid_menu.mes._x + ngid_menu.mes._width - 18;
ngid_menu.slider_bar._y = ngid_menu.mes._y;
//          var h = ngid_menu.mes._height
ngid_menu.slider_bar.lineStyle(1, 0x000000, 100);
ngid_menu.slider_bar.beginFill(0xffffff, 100);
ngid_menu.slider_bar.moveTo(0, 0);
ngid_menu.slider_bar.lineTo(17, 0);
ngid_menu.slider_bar.lineTo(17, ngid_menu.mes._height);
ngid_menu.slider_bar.lineTo(0, ngid_menu.mes._height);
ngid_menu.slider_bar.lineTo(0, 0);
ngid_menu.slider_bar.endFill();
ngid_menu.slider_bar._alpha = 70;
ngid_menu.slider_bar.onPress = function() {
    var ym = this._ymouse + ngid_menu.mes._y;
    var move_value = 16;
    if (ym < ngid_menu.slider_knob._y) {
        move_value = -16;
    }
    scrollNGIDMenu(move_value);
    var bar_click_interval = 0;
    var bar_scroll_interval = 0;
    this.onEnterFrame = function() {
        bar_click_interval++;
        bar_scroll_interval++;
        if (bar_click_interval > 30) {
            bar_click_interval = 61;
            if (bar_scroll_interval > 2) {
                scrollNGIDMenu(move_value);
                bar_scroll_interval = 0;
                var ym = this._ymouse + ngid_menu.mes._y;
                if ((move_value > 0 && ym < ngid_menu.slider_knob._y) || (move_value < 0 && ym > ngid_menu.slider_knob._y)) {
                    bar_click_interval = undefined;
                    bar_scroll_interval = undefined;
                    delete this.onEnterFrame;
                }
            }
        }
    };
};
ngid_menu.slider_bar.onRelease = function() {
    delete this.onEnterFrame;
};
ngid_menu.slider_bar.onReleaseOutside = ngid_menu.slider_bar.onRelease;
createSquareBtn(ngid_menu, "export_id", "Copy", white12b_fmt, 211, 40, 326, 60, 20, 0x303030);
ngid_menu.export_id.onRelease = function() {
    this._alpha = 40;
    var output = "";
    ng_ids.sortOn("user_id", 16);
    for (var i = 0; i < ng_ids.length; i++) {
        output += ng_ids[i].user_id + "\n";
    }
    System.setClipboard(output);
    showInfoOnMainBar("NGIDを" + ng_ids.length + "件クリップボードにコピーしました");
};
createSquareBtn(ngid_menu, "import_id", "Import", white12b_fmt, 213, 105, 326, 60, 20, 0x303030);
ngid_menu.import_id.onRelease = function() {
    updateNGIDMenu("import_id");
};
createSquareBtn(ngid_menu, "ok", "OK", white12b_fmt, 215, 300, 40, 40, 18, 0x303030);
ngid_menu.ok.onRelease = function() {
    var mes_ary = new Array();
    mes_ary = ngid_menu.mes.text.split("\r"); //nだとダメだった
    var num_ary = new Array();
    for (var i = 0; i < mes_ary.length; i++) { //27文字ピッタリ、もしくは数字だけのヤツを読み込む
        if (mes_ary[i].length == 27 || checkNum(mes_ary[i])) {
            num_ary.push({
                user_id: mes_ary[i],
                date: 0,
                message: "unknown"
            });
        }
    }
    cand_ng_id = deleteRepField(num_ary, "user_id", false);
    updateFilter("add_id");
};
createSquareBtn(ngid_menu, "cancel", "CANCEL", white12b_fmt, 217, 352, 40, 60, 18, 0x303030);
ngid_menu.cancel.onRelease = function() {
    updateNGIDMenu("ng_ids");
};
ngid_menu.createTextField("label_delete_no", 220, 185, 316, 1, 1);
ngid_menu.label_delete_no.text = "No.";
ngid_menu.label_delete_no.type = "dynamic";
ngid_menu.label_delete_no.border = false;
ngid_menu.label_delete_no.selectable = false;
ngid_menu.label_delete_no.background = false;
ngid_menu.label_delete_no.autoSize = true;
ngid_menu.label_delete_no.tabEnabled = false;
ngid_menu.label_delete_no.setTextFormat(black12_fmt);
ngid_menu.label_delete_no._visible = false;
ngid_menu.createTextField("input_delete_no", 221, 210, 315, 30, 20);
ngid_menu.input_delete_no.text = "";
ngid_menu.input_delete_no.type = "input";
ngid_menu.input_delete_no.border = true;
ngid_menu.input_delete_no.background = false;
ngid_menu.input_delete_no.autoSize = false;
ngid_menu.input_delete_no.tabEnabled = true;
ngid_menu.input_delete_no.setTextFormat(black12_fmt);
ngid_menu.input_delete_no.onChanged = function() {
    for (var i = 0; i < ngid_menu.input_delete_no.text.length; i++) {
        if (!checkNum(ngid_menu.input_delete_no.text.charAt(i))) {
            delete_no = undefined;
            return;
        }
    }
    if (ngid_menu.input_delete_no.text.length > 0) {
        delete_no = Number(ngid_menu.input_delete_no.text);
    } else {
        delete_no = undefined;
    }
};
ngid_menu.input_delete_no._visible = false;
createSquareBtn(ngid_menu, "delete_id", "削除", white12b_fmt, 222, 280, 326, 70, 20, 0x303030);
ngid_menu.delete_id.onRelease = function() {
    if (delete_no != undefined) {
        updateFilter("delete_id", delete_no);
        ngid_menu.input_delete_no.text = "";
        delete_no = undefined;
    }
    this._alpha = 40;
};
ngid_menu.delete_id._visible = false;
createSquareBtn(ngid_menu, "clear_id", "全削除", white12b_fmt, 223, 355, 326, 70, 20, 0x303030);
ngid_menu.clear_id.onRelease = function() {
    updateFilter("clear_id");
    this._alpha = 40;
};
ngid_menu.clear_id._visible = false;
ngid_menu.createTextField("label_max_ng_id", 225, 179, 31, 1, 1);
ngid_menu.label_max_ng_id.text = "[Max:　　　　　　件]";
ngid_menu.label_max_ng_id.type = "dynamic";
ngid_menu.label_max_ng_id.border = false;
ngid_menu.label_max_ng_id.selectable = false;
ngid_menu.label_max_ng_id.background = false;
ngid_menu.label_max_ng_id.autoSize = true;
ngid_menu.label_max_ng_id.tabEnabled = false;
ngid_menu.label_max_ng_id.setTextFormat(black12_fmt);
ngid_menu.label_max_ng_id._visible = false;
ngid_menu.createTextField("input_max_ng_id", 226, 212, 31, 40, 17);
ngid_menu.input_max_ng_id.text = max_ng_id;
ngid_menu.input_max_ng_id.type = "input";
ngid_menu.input_max_ng_id.border = true;
ngid_menu.input_max_ng_id.background = false;
ngid_menu.input_max_ng_id.autoSize = false;
ngid_menu.input_max_ng_id.tabEnabled = true;
ngid_menu.input_max_ng_id.setTextFormat(black12_fmt);
ngid_menu.input_max_ng_id.onChanged = function() {
    max_ng_id = Number(ngid_menu.input_max_ng_id.text);
    max_ng_id_so.data.value = ngid_menu.input_max_ng_id.text;
    max_ng_id_so.flush();
};
ngid_menu.createTextField("label_ng_id_expires", 227, 280, 31, 1, 1);
ngid_menu.label_ng_id_expires.text = "[期限:　　　　　　日]";
ngid_menu.label_ng_id_expires.type = "dynamic";
ngid_menu.label_ng_id_expires.border = false;
ngid_menu.label_ng_id_expires.selectable = false;
ngid_menu.label_ng_id_expires.background = false;
ngid_menu.label_ng_id_expires.autoSize = true;
ngid_menu.label_ng_id_expires.tabEnabled = false;
ngid_menu.label_ng_id_expires.setTextFormat(black12_fmt);
ngid_menu.label_ng_id_expires._visible = false;
ngid_menu.createTextField("input_ng_id_expires", 228, 316, 31, 40, 17);
ngid_menu.input_ng_id_expires.text = ng_id_expires;
ngid_menu.input_ng_id_expires.type = "input";
ngid_menu.input_ng_id_expires.border = true;
ngid_menu.input_ng_id_expires.background = false;
ngid_menu.input_ng_id_expires.autoSize = false;
ngid_menu.input_ng_id_expires.tabEnabled = true;
ngid_menu.input_ng_id_expires.setTextFormat(black12_fmt);
ngid_menu.input_ng_id_expires.onChanged = function() {
    ng_id_expires = Number(ngid_menu.input_ng_id_expires.text);
    ng_id_expires_so.data.value = ngid_menu.input_ng_id_expires.text;
    ng_id_expires_so.flush();
};
//NGIDメニュー

function updateNGIDMenu(mode) {
    if (mode == "close") { //ウィンドウを消す
        ngid_menu._visible = false;
        ngid_menu.slider_knob.removeMovieClip(); //一応消しとく
        ngid_menu.mes.text = "";
    } else {
        ngid_menu._visible = true;
        if (ngid_menu.bg != undefined && ngid_menu.bg.getBytesTotal() > 0) {
            ngid_menu.bg._alpha = ngid_menu_bg_alpha;
            ngid_menu.bg._x = ngid_menu.mes._x + 1;
            ngid_menu.bg._y = ngid_menu.mes._y + 1;
            ngid_menu.bg._width = 380 - 1;
            ngid_menu.bg._height = ngid_menu.mes._height - 1;
        }
        //modeごとの処理
        if (mode == "ng_ids") { //NGID一覧
            ngid_menu.mes.text = "";
            ngid_menu.mes.type = "dynamic";
            ngid_menu.ok._visible = false;
            ngid_menu.cancel._visible = false;
            ngid_menu.export_id._visible = true;
            ngid_menu.import_id._visible = true;
            ngid_menu.label_max_ng_id._visible = true;
            ngid_menu.input_max_ng_id._visible = true;
            ngid_menu.label_ng_id_expires._visible = true;
            ngid_menu.input_ng_id_expires._visible = true;
            if (ng_ids.length > 0) {
                ngid_menu.label_delete_no._visible = true;
                ngid_menu.input_delete_no._visible = true;
                ngid_menu.delete_id._visible = true;
                ngid_menu.clear_id._visible = true;
            } else {
                ngid_menu.label_delete_no._visible = false;
                ngid_menu.input_delete_no._visible = false;
                ngid_menu.delete_id._visible = false;
                ngid_menu.clear_id._visible = false;
            }
            ngid_menu.info.text = "NGID一覧";
            ngid_menu.header.text = "最新ヒットリスト 全" + ng_ids.length + "件";
            var mess = "";
            var myDate = new Date();
            var ms, day, hour, min, sec, time;
            ng_ids = deleteExpID(ng_ids, false); //期限切れ、容量オーバーを削除、結果はdateフィールドの数値の大きい順に並べられる
            for (var i = 0; i < ng_ids.length; i++) {
                ms = myDate.getTime() - ng_ids[i].date;
                day = Math.floor(ms / (1000 * 60 * 60 * 24));
                hour = Math.floor(ms / (1000 * 60 * 60)) - Math.floor(Math.floor(ms / (1000 * 60 * 60)) / 24) * 24;
                min = Math.floor(ms / (1000 * 60)) - Math.floor(Math.floor(ms / (1000 * 60)) / 60) * 60;
                sec = Math.floor(ms / (1000)) - Math.floor(Math.floor(ms / (1000)) / 60) * 60;
                if (day >= 2) {
                    if (day < 10) {
                        day = "0" + day;
                    }
                    time = day + "日前";
                } else {
                    if (day == 1) {
                        time = (day * 24 + hour) + "時間前";
                    } else if (hour > 0) {
                        if (hour < 10) {
                            hour = "0" + hour;
                        }
                        time = hour + "時間前";
                    } else if (min > 0) {
                        if (min < 10) {
                            min = "0" + min;
                        }
                        time = min + "分前";
                    } else {
                        if (sec < 10) {
                            sec = "0" + sec;
                        }
                        time = sec + "秒前";
                    }
                }
                mess += "[" + i + "]  " + time + " [" + ng_ids[i].user_id.substr(0, id_length) + "] " + replaceSentence(ng_ids[i].message, ["\n", "\r"], "") + "\n";
            }
            ngid_menu.mes.text = mess;
            ng_ids.sortOn("user_id", 16); //user_idの数値の小さい順に戻しておく
            ng_ids_so.data.ids = ng_ids;
            ng_ids_so.flush();
            ngid_menu.info.setTextFormat(black12_fmt);
            ngid_menu.info._x = ngid_menu._width / 2 - ngid_menu.info._width / 2;
            ngid_menu.header.setTextFormat(black12_fmt);
            ngid_menu.mes.setTextFormat(black12_fmt);
            ngid_menu.mes.scroll = 0;
        } else if (mode == "import_id") { //ID Import
            ngid_menu.mes.type = "input";
            ngid_menu.mes.text = "27文字の行\nもしくは数字だけの行をNGIDとして登録します。\n";
            ngid_menu.mes.setTextFormat(black12_fmt);
            ngid_menu.info.text = "IDを読み込み";
            ngid_menu.info.setTextFormat(black12_fmt);
            ngid_menu.info._x = ngid_menu._width / 2 - ngid_menu.info._width / 2;
            ngid_menu.header.text = "ID(数字)を入力してOKボタンを押してください";
            ngid_menu.header.setTextFormat(black12_fmt);
            ngid_menu.ok._visible = true;
            ngid_menu.cancel._visible = true;
            ngid_menu.export_id._visible = false;
            ngid_menu.import_id._visible = false;
            ngid_menu.label_max_ng_id._visible = false;
            ngid_menu.input_max_ng_id._visible = false;
            ngid_menu.label_ng_id_expires._visible = false;
            ngid_menu.input_ng_id_expires._visible = false;
            ngid_menu.label_delete_no._visible = false;
            ngid_menu.input_delete_no._visible = false;
            ngid_menu.delete_id._visible = false;
            ngid_menu.clear_id._visible = false;
        }
        //リストを作成し終わったら大きさにあわせてスライドノブ生成
        if (ngid_menu.slider_knob != undefined) {
            ngid_menu.slider_knob.removeMovieClip();
            //swfversion7でremoveMovieClipがなぜか効かないので応急処置
            ngid_menu.slider_knob._visible = false;
        }
        if (ngid_menu.mes.textHeight < ngid_menu.mes._height) {
            ngid_menu.mes._width = 380;
            ngid_menu.slider_bar._visible = false;
        } else {
            ngid_menu.mes._width = 380 - ngid_menu.slider_bar._width;
            ngid_menu.slider_bar._visible = true;
            var slider_height = ngid_menu.mes._height * ngid_menu.mes._height / ngid_menu.mes.textHeight;
            if (slider_height > ngid_menu.mes._height) {
                slider_height = ngid_menu.mes._height;
            }
            if (slider_height < 30) {
                slider_height = 30;
            }
            createSquareBtn(ngid_menu, "slider_knob", "", undefined, 210, undefined, undefined, ngid_menu.slider_bar._width - 1, slider_height, 0x303030);
            ngid_menu.slider_knob._x = ngid_menu.mes._x + ngid_menu.mes._width + (ngid_menu.slider_knob._width / 2);
            ngid_menu.slider_knob._y = ngid_menu.mes._y + (ngid_menu.slider_knob._height / 2);
            ngid_menu.ratio = 0;
            ngid_menu.slider_knob.onPress = function() {
                this.startDrag(true, this._x, ngid_menu.mes._y + (this._height / 2), this._x, ngid_menu.mes._y + ngid_menu.mes._height - (this._height / 2));
                this.onEnterFrame = function() {
                    this.ratio = Math.round((this._y - (ngid_menu.mes._y + (this._height / 2))) * 100 / (ngid_menu.mes._height - this._height));
                    ngid_menu.mes.scroll = ngid_menu.mes.maxscroll * this.ratio / 100;
                };
            };
            ngid_menu.slider_knob.onRelease = function() {
                this.stopDrag();
                delete this.onEnterFrame;
            };
            ngid_menu.slider_knob.onReleaseOutside = ngid_menu.slider_knob.onRelease;
        }
    }
}
function scrollNGIDMenu(num) {
    ngid_menu.mes.scroll = ngid_menu.mes.scroll + num;
    if (ngid_menu.slider_knob != undefined) {
        if (ngid_menu.mes.scroll <= 1) {
            ngid_menu.slider_knob._y = ngid_menu.mes._y + ngid_menu.slider_knob._height / 2;
        } else if (ngid_menu.mes.scroll >= ngid_menu.mes.maxscroll) {
            ngid_menu.slider_knob._y = ngid_menu.mes._y + ngid_menu.mes._height - ngid_menu.slider_knob._height / 2;
        } else {
            ngid_menu.slider_knob._y = ngid_menu.mes.scroll * (ngid_menu.mes._height - ngid_menu.slider_knob._height) / ngid_menu.mes.maxscroll + ngid_menu.mes._y + ngid_menu.slider_knob._height / 2;
        }
    }
}
function ClearLog() {
    nico.LogList.removeAll();
    nico.LogList_Wb.removeAll();
    nico.LogListDP.removeAll();
}
function ClearLog_Nicos() {
    nico.LogList_Nicos.removeAll();
    nico.LogList_Wb_Nicos.removeAll();
    nico.LogListDP_Nicos.removeAll();
}
function ClearLog_ownerthread() {
    nico.LogList_ownerthread.removeAll();
    nico.LogListDP_ownerthread.removeAll();
}
//flvplayerのリストで表示する

function updateLogList(mode) {
    //コメント編集時、非表示チェックボックスのバックアップを取る
    if (e) {
        for (var i = 0; i < nico.LogList_Nicos.length; i++) {
            var obj = nico.LogList_Nicos.getItemAt(i);
            loglist_deleted_nicos[obj.resno] = obj.deleted;
        }
        for (var i = 0; i < nico.LogList.length; i++) {
            var obj = nico.LogList.getItemAt(i);
            if (obj.message.indexOf('Nicos.') != 0 && obj.message.indexOf('Local.') != 0 && obj.message.indexOf('Owner.') != 0) {
                loglist_deleted[obj.resno] = obj.deleted;
            }
            if (obj.message.indexOf('Nicos.') == 0) {
                loglist_deleted_nicos[obj.resno] = obj.deleted;
            }
        }
    }
    if (mode == "clear") { //空欄にする
        loglist_menu.cand_ng_id_list._visible = false;
        loglist_menu.add_id._visible = false;
        if (list_mode != "normal") {
            if (always_back_to_normal_mode) {
                updateLogList("normal");
                return;
            } else {
                ClearLog();
                cand_ng_id = new Array();
                if (!nico.isLargeScreen) {
                    loglist_menu.tab._visible = true;
                    loglist_menu.normal_list._visible = true;
                }
            }
        } else if (cand_ng_id.length > 0) {
            //list_mode = "cand_ng_id";
            updateLogList("normal");
        }
    }
    if (mode == "cand_ng_id") { //強調表示中のコメント
        if (cand_ng_id.length == 0) {
            updateLogList("clear");
            return;
        }
        list_mode = "cand_ng_id";
        ClearLog();
        nico.LogList._visible = true;
        nico.LogList_Nicos._visible = false;
        nico.LoglistSelectList._visible = false;
        if (!nico.isLargeScreen) {
            loglist_menu.cand_ng_id_list._visible = false;
            loglist_menu.tab._visible = true;
            loglist_menu.normal_list._visible = true;
        }
        if (!e && !owner_thread_edit_mode) {
            loglist_menu.add_id._visible = true;
        }
        nico.LogList.vPosition = 0;
        nico.updateTab(nico.tabmenu.loglist_tab);
        cand_ng_id.sortOn("vpos", 16);
        for (var i = 0; i < cand_ng_id.length; i++) {
            var no = cand_ng_id[i].no;
            var id = "[" + cand_ng_id[i].user_id.substr(0, id_length) + "] ";
            var mes;
            if (cand_ng_id[i].msgs == 'current') {
                mes = fwMessages[no];
            } else if (cand_ng_id[i].msgs == 'nicos') {
                mes = fwMessages_Nicos[no];
            } else if (cand_ng_id[i].msgs == 'game') {
                mes = fwMessages_ownerthread[no];
            }
            if (cand_ng_id[i].msgs != 'local') {
                if (mes.premium) {
                    id = "P" + id;
                }
                if (cand_ng_id[i].msgs == 'nicos') {
                    id = "Nicos." + id;
                } else if (cand_ng_id[i].msgs == 'game') {
                    id = "Owner." + id;
                }
                nico.AddChatLog(nico.LogListDP, i, 0, mes._no, cand_ng_id[i].user_id, mes._vpos, id + mes._message, mes.mail, "", mes.date, 0, mes._scriptError);
            } else {
                mes = nico.Messages_Local[no];
                if (mes.premium) {
                    id = "P" + id;
                }
                id = "Local." + id;
                nico.AddChatLog(nico.LogListDP, i, 0, mes._no, cand_ng_id[i]._user, mes._vpos, id + mes._message, mes._mail, "", 0, 0, mes._scriptError);
            }
            //コメント編集時、コメントの非表示チェックボックスを復帰させる
            if (e) {
                if (cand_ng_id[i].msgs == 'current') {
                    if (loglist_deleted[mes._no]) {
                        nico.LogList.editField(i, 'deleted', true);
                    }
                } else if (cand_ng_id[i].msgs == 'nicos') {
                    if (loglist_deleted_nicos[mes._no]) {
                        nico.LogList.editField(i, 'deleted', true);
                    }
                }
            }
            //公式NGフィルターを適用
            if (ngmessage_flag[no]) {
                nico.LogList.editField(i, 'message', '###このコメントは表示されません###');
            }
        }
        nico.writeLogList(nico.LogList, nico.LogListDP, nico.LogList_Wb, nico.deleteList);
    }
    if (mode == "normal") { //もとの普通のリストに戻す
        ClearLog();
        clearEmphMes("both");
        cand_ng_id = new Array();
        loglist_menu.cand_ng_id_list._visible = false;
        loglist_menu.tab._visible = false;
        loglist_menu.normal_list._visible = false;
        loglist_menu.add_id._visible = false;
        nico.LoglistSelectList._visible = true;
        if (nico.LoglistSelectList.selectedItem.data == 'nicos') {
            nico.LogList._visible = false;
            nico.LogList_Nicos._visible = true;
        }
        for (var i = 0, j = 0, l = fwMessages.length; i < l; i++) {
            var mes = fwMessages[i];
            var message = mes._message;
            if (add_id) { //add_idならAddChatLogする前にメッセージにID付与
                message = "[" + mes.user_id.substr(0, id_length) + "] " + message;
                if (mes.premium) {
                    message = "P" + message;
                }
            }
            if (!ngid_filter_flag[i]) {
                nico.AddChatLog(nico.LogListDP, j, 0, mes._no, mes.user_id, mes._vpos, message, mes.mail, "", mes.date, 0, mes._scriptError);
                //コメント編集時、コメントの非表示チェックボックスを復帰させる
                if (e) {
                    if (loglist_deleted[mes._no]) {
                        nico.LogList.editField(j, 'deleted', true);
                    }
                }
                //公式NGフィルターを適用
                if (ngmessage_flag[i]) {
                    nico.LogList.editField(j, 'message', '###このコメントは表示されません###');
                }
                j++;
            }
        }
        //ソートカラムを復帰する (nico.isPlayScroll時はnico.writeLogList内で再生時間でソートされる)
        if (!nico.isPlayScroll) {
            var options;
            if (nico.LogList.sortDirection == 'DESC') {
                options = Array.DESCENDING;
            }
            if (loglist_sorted_column == 'resno' || loglist_sorted_column == 'when') {
                options = options | Array.NUMERIC;
            }
            nico.LogList.dataProvider.sortOn(loglist_sorted_column, options);
        }
        nico.writeLogList(nico.LogList, nico.LogListDP, nico.LogList_Wb, nico.deleteList);
        //ニコスコメントに非表示チェックボックスを反映させる
        if (e) {
            for (var i = 0; i < nico.LogList_Nicos.length; i++) {
                var obj = nico.LogList_Nicos.getItemAt(i);
                if (loglist_deleted_nicos[obj.resno]) {
                    nico.LogList_Nicos.editField(i, 'deleted', true);
                } else {
                    nico.LogList_Nicos.editField(i, 'deleted', false);
                }
            }
            nico.writeLogList(nico.LogList_Nicos, nico.LogListDP_Nicos, nico.LogList_Wb_Nicos, nico.deleteList_nicos);
        }
        //↓リストの一番下までスクロールさせる
        //nico.LogList.vPosition = nico.LogList.length;
        list_mode = "normal";
        showInfoOnMainBar("");
        //↓自動スクロールを元の状態に戻す
        //nico.tabmenu.loglist_menu.autoScroll.selected = auto_scroll_backup;
    }
    if (mode == "nicos") { //ニコスコメント一覧を再描画する
        ClearLog_Nicos();
        for (var i = 0, j = 0, l = fwMessages_Nicos.length; i < l; i++) {
            var mes = fwMessages_Nicos[i];
            var message = mes._message;
            if (add_id) { //add_idならAddChatLogする前にメッセージにID付与
                message = "[" + mes.user_id.substr(0, id_length) + "] " + message;
                if (mes.premium) {
                    message = "P" + message;
                }
            }
            nico.AddChatLog(nico.LogListDP_Nicos, j, 0, mes._no, mes.user_id, mes._vpos, message, mes.mail, "", mes.date, 0, mes._scriptError);
            j++;
        }
        nico.writeLogList(nico.LogList_Nicos, nico.LogListDP_Nicos, nico.LogList_Wb_Nicos, nico.deleteList_nicos);
    }
    if (mode == "ownerthread") { //投稿者コメント欄を再描画する
        ClearLog_ownerthread();
        for (var i = 0, j = 0, l = fwMessages_ownerthread.length; i < l; i++) {
            var mes = fwMessages_ownerthread[i];
            var message = mes._message;
            //コメント編集のため、IDは表示しない
            //if(add_id){//add_idならAddChatLogする前にメッセージにID付与
            //  message = "[" + mes.user_id.substr(0,id_length) + "] " + message;
            //  if(mes.premium){
            //      message = "P" + message;
            //  }
            //}
            nico.AddChatLog(nico.LogListDP_ownerthread, j, 0, mes._no, mes.user_id, mes._vpos, message, mes.mail, "", mes.date, 0, mes._scriptError);
            j++;
        }
        nico.writeLogList_ownerthread();
    }
}
//★★★★★★★★★★★★★kakikomi確認メニュー(21000) ★★★★★★★★★★★★★
//自前でスクロールバーとか一式作るとどうなるんだろうかという実験
if (apply_kakikomi) {
    kakikomi_menu.swapDepths(21500);
    kakikomi_menu._visible = false;
    kakikomi_menu.base.onPress = function() {
        var xm = kakikomi_menu._xmouse;
        var ym = kakikomi_menu._ymouse;
        if (xm > 0 && xm < 369 && ym > 0 && ym < 25) {
            kakikomi_menu.startDrag();
        }
        goTopDepth(kakikomi_menu);
    };
    kakikomi_menu.base.onRelease = function() {
        var xm = kakikomi_menu._xmouse;
        var ym = kakikomi_menu._ymouse;
        if (xm > 370 && xm < 395 && ym > 0 && ym < 25) {
            updateKakikomiMenu("close");
        } else {
            kakikomi_menu.stopDrag("");
        }
    };
    kakikomi_menu.base.onReleaseOutside = kakikomi_menu.base.onRelease;
    if ((VIDEO.substr(0, 2) == "sm" || VIDEO.substr(0, 2) == "nm") && kakikomi_menu_bg_alpha > 0) {
        kakikomi_menu.createEmptyMovieClip("bg", 201);
        if (useswfversion >= 7) {
            var bg_mcl = new MovieClipLoader();
            bg_mcl.loadClip(thumbImage, kakikomi_menu.bg);
        } else {
            kakikomi_menu.bg.loadMovie(thumbImage);
        }
    }
    kakikomi_menu.createTextField("info", 202, 0, 5, 1, 1);
    kakikomi_menu.info.type = "dynamic";
    kakikomi_menu.info.selectable = false;
    kakikomi_menu.info.border = false;
    kakikomi_menu.info.background = false;
    kakikomi_menu.info.autoSize = true;
    kakikomi_menu.createTextField("header", 205, 20, 31, 1, 1);
    kakikomi_menu.header.type = "dynamic";
    kakikomi_menu.header.selectable = false;
    kakikomi_menu.header.border = false;
    kakikomi_menu.header.background = false;
    kakikomi_menu.header.autoSize = true;
    kakikomi_menu.createTextField("mes", 206, 10, 52, 380, 260);
    kakikomi_menu.mes.type = "dynamic";
    kakikomi_menu.mes.border = true;
    kakikomi_menu.mes.background = false;
    kakikomi_menu.mes.autoSize = false;
    kakikomi_menu.mes.wordWrap = false;
    kakikomi_menu.mes.multiline = true;
    kakikomi_menu.mes.mouseWheelEnabled = false;
    //スクロールバー
    kakikomi_menu.createEmptyMovieClip("slider_bar", 209);
    //          var x = kakikomi_menu.mes._x + kakikomi_menu.mes._width - 18
    //          var y = kakikomi_menu.mes._y
    kakikomi_menu.slider_bar._x = kakikomi_menu.mes._x + kakikomi_menu.mes._width - 18;
    kakikomi_menu.slider_bar._y = kakikomi_menu.mes._y;
    //          var h = kakikomi_menu.mes._height
    kakikomi_menu.slider_bar.lineStyle(1, 0x000000, 100);
    kakikomi_menu.slider_bar.beginFill(0xffffff, 100);
    kakikomi_menu.slider_bar.moveTo(0, 0);
    kakikomi_menu.slider_bar.lineTo(17, 0);
    kakikomi_menu.slider_bar.lineTo(17, kakikomi_menu.mes._height);
    kakikomi_menu.slider_bar.lineTo(0, kakikomi_menu.mes._height);
    kakikomi_menu.slider_bar.lineTo(0, 0);
    kakikomi_menu.slider_bar.endFill();
    kakikomi_menu.slider_bar._alpha = 70;
    kakikomi_menu.slider_bar.onPress = function() {
        var ym = this._ymouse + kakikomi_menu.mes._y;
        var move_value = 16;
        if (ym < kakikomi_menu.slider_knob._y) {
            move_value = -16;
        }
        scrollKakikomiMenu(move_value);
        var bar_click_interval = 0;
        var bar_scroll_interval = 0;
        this.onEnterFrame = function() {
            bar_click_interval++;
            bar_scroll_interval++;
            if (bar_click_interval > 30) {
                bar_click_interval = 61;
                if (bar_scroll_interval > 2) {
                    scrollKakikomiMenu(move_value);
                    bar_scroll_interval = 0;
                    var ym = this._ymouse + kakikomi_menu.mes._y;
                    if ((move_value > 0 && ym < kakikomi_menu.slider_knob._y) || (move_value < 0 && ym > kakikomi_menu.slider_knob._y)) {
                        bar_click_interval = undefined;
                        bar_scroll_interval = undefined;
                        delete this.onEnterFrame;
                    }
                }
            }
        };
    };
    kakikomi_menu.slider_bar.onRelease = function() {
        delete this.onEnterFrame;
    };
    kakikomi_menu.slider_bar.onReleaseOutside = kakikomi_menu.slider_bar.onRelease;
    createSquareBtn(kakikomi_menu, "export_id", "Copy", white12b_fmt, 251, 40, 326, 60, 20, 0x303030);
    kakikomi_menu.export_id.onRelease = function() {
        this._alpha = 40;
        var output = "";
        var tmp;
        var myDate = new Date();
        output += myDate.getFullYear() + "年" + (myDate.getMonth() + 1) + "月" + myDate.getDate() + "日 " + myDate.getHours() + ":" + myDate.getMinutes() + ":" + myDate.getSeconds() + "までのカキコミ記録\n";
        for (var i = 0; i < kaki_txt.length; i++) {
            if (kaki_txt[i].video_id != tmp) {
                myDate.setTime(kaki_txt[i].date);
                output += "\n日時 : " + myDate.getFullYear() + "年" + (myDate.getMonth() + 1) + "月" + myDate.getDate() + "日 " + myDate.getHours() + ":" + myDate.getMinutes() + ":" + myDate.getSeconds() + "\n" + "タイトル : " + kaki_txt[i].video_title + "\n" + "動画URL  : " + "http://www.nicovideo.jp/watch/" + kaki_txt[i].video_id + "\n" + "コメ番号 : " + kaki_txt[i].message_no + "\n" + "コメント : \n\n" + replaceSentence(kaki_txt[i].message, ["\n", "\r"], "") + "\n";
            } else {
                output += replaceSentence(kaki_txt[i].message, ["\n", "\r"], "") + "\n";
            }
            tmp = kaki_txt[i].video_id;
        };
        System.setClipboard(output);
        showInfoOnMainBar("logを" + kaki_txt.length + "件クリップボードにコピーしました");
    };
    createSquareBtn(kakikomi_menu, "clear_kakikomi", "全削除", white12b_fmt, 263, 355, 326, 70, 20, 0x303030);
    kakikomi_menu.clear_kakikomi.onRelease = function() {
        updateFilter("clear_kakikomi");
        this._alpha = 40;
    };
    kakikomi_menu.clear_kakikomi._visible = false;
    kakikomi_menu.createTextField("label_max_kaki_komi", 225, 179, 31, 1, 1);
    kakikomi_menu.label_max_kaki_komi.text = "[Max:　　　　　　件]";
    kakikomi_menu.label_max_kaki_komi.type = "dynamic";
    kakikomi_menu.label_max_kaki_komi.border = false;
    kakikomi_menu.label_max_kaki_komi.selectable = false;
    kakikomi_menu.label_max_kaki_komi.background = false;
    kakikomi_menu.label_max_kaki_komi.autoSize = true;
    kakikomi_menu.label_max_kaki_komi.tabEnabled = false;
    kakikomi_menu.label_max_kaki_komi.setTextFormat(black12_fmt);
    kakikomi_menu.label_max_kaki_komi._visible = false;
    kakikomi_menu.createTextField("input_max_kaki_komi", 226, 212, 31, 40, 17);
    kakikomi_menu.input_max_kaki_komi.text = max_kaki_komi;
    kakikomi_menu.input_max_kaki_komi.type = "input";
    kakikomi_menu.input_max_kaki_komi.border = true;
    kakikomi_menu.input_max_kaki_komi.background = false;
    kakikomi_menu.input_max_kaki_komi.autoSize = false;
    kakikomi_menu.input_max_kaki_komi.tabEnabled = true;
    kakikomi_menu.input_max_kaki_komi.setTextFormat(black12_fmt);
    kakikomi_menu.input_max_kaki_komi.onChanged = function() {
        max_kaki_komi = Number(kakikomi_menu.input_max_kaki_komi.text);
        max_kaki_komi_so.data.value = kakikomi_menu.input_max_kaki_komi.text;
        max_kaki_komi_so.flush();
    };
    kakikomi_menu.createTextField("label_kaki_komi_expires", 227, 280, 31, 1, 1);
    kakikomi_menu.label_kaki_komi_expires.text = "[期限:　　　　　　日]";
    kakikomi_menu.label_kaki_komi_expires.type = "dynamic";
    kakikomi_menu.label_kaki_komi_expires.border = false;
    kakikomi_menu.label_kaki_komi_expires.selectable = false;
    kakikomi_menu.label_kaki_komi_expires.background = false;
    kakikomi_menu.label_kaki_komi_expires.autoSize = true;
    kakikomi_menu.label_kaki_komi_expires.tabEnabled = false;
    kakikomi_menu.label_kaki_komi_expires.setTextFormat(black12_fmt);
    kakikomi_menu.label_kaki_komi_expires._visible = false;
    kakikomi_menu.createTextField("input_kaki_komi_expires", 228, 316, 31, 40, 17);
    kakikomi_menu.input_kaki_komi_expires.text = kaki_komi_expires;
    kakikomi_menu.input_kaki_komi_expires.type = "input";
    kakikomi_menu.input_kaki_komi_expires.border = true;
    kakikomi_menu.input_kaki_komi_expires.background = false;
    kakikomi_menu.input_kaki_komi_expires.autoSize = false;
    kakikomi_menu.input_kaki_komi_expires.tabEnabled = true;
    kakikomi_menu.input_kaki_komi_expires.setTextFormat(black12_fmt);
    kakikomi_menu.input_kaki_komi_expires.onChanged = function() {
        kaki_komi_expires = Number(kakikomi_menu.input_kaki_komi_expires.text);
        kaki_komi_expires_so.data.value = kakikomi_menu.input_kaki_komi_expires.text;
        kaki_komi_expires_so.flush();
    };
} //END if(apply_kakikomi)
//NGIDメニュー

function updateKakikomiMenu(mode) {
    if (mode == "close") { //ウィンドウを消す
        kakikomi_menu._visible = false;
        kakikomi_menu.slider_knob.removeMovieClip(); //一応消しとく
        kakikomi_menu.mes.htmltext = "";
    } else {
        kakikomi_menu._visible = true;
        if (kakikomi_menu.bg != undefined && kakikomi_menu.bg.getBytesTotal() > 0) {
            kakikomi_menu.bg._alpha = kakikomi_menu_bg_alpha;
            kakikomi_menu.bg._x = kakikomi_menu.mes._x + 1;
            kakikomi_menu.bg._y = kakikomi_menu.mes._y + 1;
            kakikomi_menu.bg._width = 380 - 1;
            kakikomi_menu.bg._height = kakikomi_menu.mes._height - 1;
        }
        //modeごとの処理
        if (mode == "kaki_txt") { //NGID一覧
            var styles = new TextField.StyleSheet();
            kakikomi_menu.mes.styleSheet = styles;
            styles.setStyle("a", {
                color: '#0000ff'
            });
            kakikomi_menu.mes.html = true;
            kakikomi_menu.mes.htmltext = "";
            kakikomi_menu.mes.type = "dynamic";
            kakikomi_menu.ok._visible = false;
            kakikomi_menu.cancel._visible = false;
            kakikomi_menu.export_id._visible = true;
            kakikomi_menu.import_id._visible = true;
            kakikomi_menu.label_max_kaki_komi._visible = true;
            kakikomi_menu.input_max_kaki_komi._visible = true;
            kakikomi_menu.label_kaki_komi_expires._visible = true;
            kakikomi_menu.input_kaki_komi_expires._visible = true;
            if (kaki_txt.length > 0) {
                kakikomi_menu.label_delete_kaki_no._visible = true;
                kakikomi_menu.input_delete_kaki_no._visible = true;
                kakikomi_menu.delete_id._visible = true;
                kakikomi_menu.clear_kakikomi._visible = true;
            } else {
                kakikomi_menu.label_delete_kaki_no._visible = false;
                kakikomi_menu.input_delete_kaki_no._visible = false;
                kakikomi_menu.delete_id._visible = false;
                kakikomi_menu.clear_kakikomi._visible = false;
            }
            kakikomi_menu.info.text = "カキコミ一覧";
            kakikomi_menu.header.text = "最新カキコミリスト 全" + kaki_txt.length + "件";
            var mess = "";
            var mess_at = ""; //見ている動画でのkakikomi
            var myDate = new Date();
            var ms, day, hour, min, sec, time, url, tmp;
            kaki_txt = deleteExpKakikomi(kaki_txt, false); //期限切れ、容量オーバーを削除、結果はdateフィールドの数値の大きい順に並べられる
            for (var i = 0; i < kaki_txt.length; i++) {
                ms = myDate.getTime() - kaki_txt[i].date;
                day = Math.floor(ms / (1000 * 60 * 60 * 24));
                hour = Math.floor(ms / (1000 * 60 * 60)) - Math.floor(Math.floor(ms / (1000 * 60 * 60)) / 24) * 24;
                min = Math.floor(ms / (1000 * 60)) - Math.floor(Math.floor(ms / (1000 * 60)) / 60) * 60;
                sec = Math.floor(ms / (1000)) - Math.floor(Math.floor(ms / (1000)) / 60) * 60;
                if (day >= 2) {
                    if (day < 10) {
                        day = "0" + day;
                    }
                    time = day + "日前";
                } else {
                    if (day == 1) {
                        time = (day * 24 + hour) + "時間前";
                    } else if (hour > 0) {
                        if (hour < 10) {
                            hour = "0" + hour;
                        }
                        time = hour + "時間前";
                    } else if (min > 0) {
                        if (min < 10) {
                            min = "0" + min;
                        }
                        time = min + "分前";
                    } else {
                        if (sec < 10) {
                            sec = "0" + sec;
                        }
                        time = sec + "秒前";
                    }
                }
                if (wv_id == kaki_txt[i].video_id) {
                    if (!mess_at) {
                        url = "<font color='#0000ff'><u><a href ='http://www.nicovideo.jp/watch/" + kaki_txt[i].video_id + "' target='_blank'>" + kaki_txt[i].video_title + "</a></u></font>";
                        mess_at += "[" + time + ":<font color='#ff0000'>" + kaki_txt[i].message_no + "</font>]" + url + "<br>" + replaceSentence(kaki_txt[i].message, ["\n", "\r"], "") + "\n";
                    } else {
                        mess_at += replaceSentence(kaki_txt[i].message, ["\n", "\r"], "") + "\n";
                    }
                }
                if (kaki_txt[i].video_id != tmp) {
                    //表示内容
                    //thumb = "<img src='http://tn-skr.smilevideo.jp/smile?i="+ kaki_txt[i].video_id.slice(2) +"'>";
                    url = "<font color='#0000ff'><u><a href ='http://www.nicovideo.jp/watch/" + kaki_txt[i].video_id + "' target='_blank'>" + kaki_txt[i].video_title + "</a></u></font>";
                    mess += "[" + time + ":<font color='#ff0000'>" + kaki_txt[i].message_no + "</font>]" + url + "<br>" + replaceSentence(kaki_txt[i].message, ["\n", "\r"], "") + "\n";
                } else {
                    mess += replaceSentence(kaki_txt[i].message, ["\n", "\r"], "") + "\n";
                }
                tmp = kaki_txt[i].video_id;
            }
            if (mess_at) {
                mess_at += "-------------------------------------------------------------------------------------------------<br>";
                kakikomi_menu.mes.htmlText = mess_at;
            }
            kakikomi_menu.mes.htmlText += mess;
            kaki_txt_so.data.ids = kaki_txt;
            kaki_txt_so.flush();
            kakikomi_menu.info.setTextFormat(black12_fmt);
            kakikomi_menu.info._x = kakikomi_menu._width / 2 - kakikomi_menu.info._width / 2;
            kakikomi_menu.header.setTextFormat(black12_fmt);
            kakikomi_menu.mes.setTextFormat(black12_fmt);
            kakikomi_menu.mes.scroll = 0;
        }
        /*else if(mode == "import_id"){//ID Import
            kakikomi_menu.mes.type = "input";
            kakikomi_menu.mes.text = "27文字の行\nもしくは数字だけの行をNGIDとして登録します。\n";
            kakikomi_menu.mes.setTextFormat(black12_fmt);
            kakikomi_menu.info.text = "IDを読み込み";
            kakikomi_menu.info.setTextFormat(black12_fmt);
            kakikomi_menu.info._x = kakikomi_menu._width / 2 - kakikomi_menu.info._width / 2;
            kakikomi_menu.header.text = "ID(数字)を入力してOKボタンを押してください";
            kakikomi_menu.header.setTextFormat(black12_fmt);
            kakikomi_menu.ok._visible = true;
            kakikomi_menu.cancel._visible = true;
            kakikomi_menu.export_id._visible = false;
            kakikomi_menu.import_id._visible = false;
            kakikomi_menu.label_max_kaki_komi._visible = false;
            kakikomi_menu.input_max_kaki_komi._visible = false;
            kakikomi_menu.label_kaki_komi_expires._visible = false;
            kakikomi_menu.input_kaki_komi_expires._visible = false;
            kakikomi_menu.label_delete_kaki_no._visible = false;
            kakikomi_menu.input_delete_kaki_no._visible = false;
            kakikomi_menu.delete_id._visible = false;
            kakikomi_menu.clear_kakikomi._visible = false;
        }*/
        //リストを作成し終わったら大きさにあわせてスライドノブ生成
        if (kakikomi_menu.slider_knob != undefined) {
            kakikomi_menu.slider_knob.removeMovieClip();
            //swfversion7でremoveMovieClipがなぜか効かないので応急処置
            kakikomi_menu.slider_knob._visible = false;
        }
        if (kakikomi_menu.mes.textHeight < kakikomi_menu.mes._height) {
            kakikomi_menu.mes._width = 380;
            kakikomi_menu.slider_bar._visible = false;
        } else {
            kakikomi_menu.mes._width = 380 - kakikomi_menu.slider_bar._width;
            kakikomi_menu.slider_bar._visible = true;
            var slider_height = kakikomi_menu.mes._height * kakikomi_menu.mes._height / kakikomi_menu.mes.textHeight;
            if (slider_height > kakikomi_menu.mes._height) {
                slider_height = kakikomi_menu.mes._height;
            }
            if (slider_height < 30) {
                slider_height = 30;
            }
            createSquareBtn(kakikomi_menu, "slider_knob", "", undefined, 210, undefined, undefined, kakikomi_menu.slider_bar._width - 1, slider_height, 0x303030);
            kakikomi_menu.slider_knob._x = kakikomi_menu.mes._x + kakikomi_menu.mes._width + (kakikomi_menu.slider_knob._width / 2);
            kakikomi_menu.slider_knob._y = kakikomi_menu.mes._y + (kakikomi_menu.slider_knob._height / 2);
            kakikomi_menu.ratio = 0;
            kakikomi_menu.slider_knob.onPress = function() {
                this.startDrag(true, this._x, kakikomi_menu.mes._y + (this._height / 2), this._x, kakikomi_menu.mes._y + kakikomi_menu.mes._height - (this._height / 2));
                this.onEnterFrame = function() {
                    this.ratio = Math.round((this._y - (kakikomi_menu.mes._y + (this._height / 2))) * 100 / (kakikomi_menu.mes._height - this._height));
                    kakikomi_menu.mes.scroll = kakikomi_menu.mes.maxscroll * this.ratio / 100;
                };
            };
            kakikomi_menu.slider_knob.onRelease = function() {
                this.stopDrag();
                delete this.onEnterFrame;
            };
            kakikomi_menu.slider_knob.onReleaseOutside = kakikomi_menu.slider_knob.onRelease;
        }
    }
}
function scrollKakikomiMenu(num) {
    kakikomi_menu.mes.scroll = kakikomi_menu.mes.scroll + num;
    if (kakikomi_menu.slider_knob != undefined) {
        if (kakikomi_menu.mes.scroll <= 1) {
            kakikomi_menu.slider_knob._y = kakikomi_menu.mes._y + kakikomi_menu.slider_knob._height / 2;
        } else if (kakikomi_menu.mes.scroll >= kakikomi_menu.mes.maxscroll) {
            kakikomi_menu.slider_knob._y = kakikomi_menu.mes._y + kakikomi_menu.mes._height - kakikomi_menu.slider_knob._height / 2;
        } else {
            kakikomi_menu.slider_knob._y = kakikomi_menu.mes.scroll * (kakikomi_menu.mes._height - kakikomi_menu.slider_knob._height) / kakikomi_menu.mes.maxscroll + kakikomi_menu.mes._y + kakikomi_menu.slider_knob._height / 2;
        }
    }
}
//★★★★★★★★★★★★★thumbとタイトル表示メニュー(21900) ★★★★★★★★★★★★★
/*
createSquareBtn(main_bar,"thumb","サムネ",white12b_fmt,10000,900,3,60,20,0x303030);
main_bar.thumb._visible = false;

main_bar.thumb._x = 780;
main_bar.thumb._y = 70;
*/
thumb_toggle = function() {
    if (thumb_menu._visible) {
        thumb_menu._visible = false;
    } else {
        if (!video_title) {
            JS_getTitle();
            thumb_menu.info.text = video_title;
            thumb_menu.info._x = thumb_menu._width / 2 - thumb_menu.info._width / 2;
        }
        thumb_menu._visible = true;
        if (thumb_menu.bg != undefined && thumb_menu.bg.getBytesTotal() > 0) {
            thumb_menu.bg._alpha = 100;
            thumb_menu.bg._x = 5;
            thumb_menu.bg._y = 32;
            thumb_menu.bg._width = 390;
            thumb_menu.bg._height = 300;
        }
    }
};
thumb_menu.swapDepths(21900);
thumb_menu._visible = false;
thumb_menu.base._alpha = 40;
thumb_menu.base.onPress = function() {
    var xm = thumb_menu._xmouse;
    var ym = thumb_menu._ymouse;
    if (xm > 0 && xm < 369 && ym > 0 && ym < 25) {
        thumb_menu.startDrag();
    }
    goTopDepth(thumb_menu);
};
thumb_menu.base.onRelease = function() {
    var xm = thumb_menu._xmouse;
    var ym = thumb_menu._ymouse;
    if (xm > 370 && xm < 395 && ym > 0 && ym < 25) {
        thumb_menu._visible = false;
    } else {
        thumb_menu.stopDrag("");
    }
};
thumb_menu.base.onReleaseOutside = thumb_menu.base.onRelease;
if ((VIDEO.substr(0, 2) == "sm" || VIDEO.substr(0, 2) == "nm") && thumb_menu_bg_alpha > 0) {
    thumb_menu.createEmptyMovieClip("bg", 201);
    if (useswfversion >= 7) {
        var bg_mcl = new MovieClipLoader();
        bg_mcl.loadClip(thumbImage, thumb_menu.bg);
    } else {
        thumb_menu.bg.loadMovie(thumbImage);
    }
}
thumb_menu.createTextField("info", 202, 0, 5, 1, 1);
thumb_menu.info.type = "dynamic";
thumb_menu.info.selectable = false;
thumb_menu.info.border = false;
thumb_menu.info.background = false;
thumb_menu.info.autoSize = true;
thumb_menu.info.setTextFormat(black12_fmt);
//ngword

function setNGfocus() {
    Selection.setFocus(ngword_filed.ngword);
}

function createNGfield() {
    if (!ngword_filed) {
        createEmptyMovieClip("ngword_filed", 30001);
        ngword_filed.opaqueBackground = 0xFFFFFF;
        ngword_filed.createTextField("ngword", 10, 0, 0, 200, 20);
        ngword_filed.ngword.type = "input";
        ngword_filed.ngword.border = true;
        ngword_filed.ngword.setTextFormat(black12_fmt);
        var each_margin = 5;
        //function createSquareBtn(path,obj_name,label,text_fmt,depth,x,y,w,h,color)
        createSquareBtn(ngword_filed, "ngword_submit", "NG", white12b_fmt, 20, 0, 10, 30, 20, 0x303030);
        ngword_filed.ngword_submit._x = ngword_filed.ngword._width + ngword_filed.ngword_submit._width / 2 + each_margin;
        ngword_filed.ngword_submit.onRelease = function() {
            if (ngword_filed.ngword.text != "") {
                quickNGWord(ngword_filed.ngword.text);
                ngword_filed.ngword.text = "";
            }
            this._alpha = 40;
        };
        createSquareBtn(ngword_filed, "ngword_cancel", "Cancel", white12b_fmt, 30, 0, 10, 50, 20, 0x303030);
        ngword_filed.ngword_cancel._x = ngword_filed.ngword_submit._x + ngword_filed.ngword_submit._width / 2 + ngword_filed.ngword_cancel._width / 2 + each_margin;
        ngword_filed.ngword_cancel.onRelease = function() {
            ngword_filed._visible = false;
            this._alpha = 40;
        };
        var xm = _root._xmouse;
        var ym = _root._ymouse;
        if (xm > ngword_filed.ngword_cancel._x) {
            ngword_filed._x = xm - ngword_filed.ngword_submit._x;
            ngword_filed._y = ym - 30;
        } else {
            ngword_filed._x = xm;
            ngword_filed._y = ym - 30;
        }
        setTimeout(setNGfocus, 200);
    } else {
        if (!ngword_filed._visible) {
            var xm = _root._xmouse;
            var ym = _root._ymouse;
            if (xm > ngword_filed.ngword_cancel._x) {
                ngword_filed._x = xm - ngword_filed.ngword_submit._x;
                ngword_filed._y = ym - 30;
            } else {
                ngword_filed._x = xm;
                ngword_filed._y = ym - 30;
            }
            ngword_filed._visible = true;
            setTimeout(setNGfocus, 200);
        } else {
            ngword_filed._visible = false;
        }
    }
}
//★★★★★★★★★★★★★設定メニュー(22000) ★★★★★★★★★★★★★
pref_menu.swapDepths(22000);
pref_menu._visible = false;
//pref_menu._alpha = 85;
pref_menu.base.swapDepths(0);
pref_menu.base.onPress = function() {
    var xm = pref_menu._xmouse;
    var ym = pref_menu._ymouse;
    if (xm > 0 && xm < 325 && ym > 0 && ym < 25) {
        pref_menu.startDrag();
    }
    goTopDepth(pref_menu);
};
pref_menu.base.onRelease = function() {
    var xm = pref_menu._xmouse;
    var ym = pref_menu._ymouse;
    if (xm > 330 && xm < 361 && ym > 0 && ym < 25) {
        closePrefMenu();
    } else {
        pref_menu.stopDrag();
    }
};
//まずtoggleボタンつくる
createToggleBtn(pref_menu, "auto_link", "自動リンク", black12_fmt, 11, 17, 42, 0x808080);
pref_menu.auto_link.on.onRelease = function() {
    this._visible = false;
    pref_menu.auto_display_auto_link._visible = false;
    auto_link = false;
    auto_link_so.data.flag = false;
    auto_link_so.flush();
};
pref_menu.auto_link.off.onRelease = function() {
    this._parent.on._visible = true;
    pref_menu.auto_display_auto_link._visible = true;
    if (auto_display_auto_link) {
        pref_menu.auto_display_auto_link.on._visible = true;
    } else {
        pref_menu.auto_display_auto_link.on._visible = false;
    }
    auto_link = true;
    auto_link_so.data.flag = true;
    auto_link_so.flush();
};
createToggleBtn(pref_menu, "auto_display_auto_link", "自動リンクを表示", black12_fmt, 12, 110, 42, 0x808080);
pref_menu.auto_display_auto_link.on.onRelease = function() {
    this._visible = false;
    auto_display_auto_link = false;
    auto_link_so.data.auto_display = false;
    auto_link_so.flush();
};
pref_menu.auto_display_auto_link.off.onRelease = function() {
    this._parent.on._visible = true;
    auto_display_auto_link = true;
    auto_link_so.data.auto_display = true;
    auto_link_so.flush();
};
createToggleBtn(pref_menu, "auto_link_blank", "リンクを別窓で開く", black12_fmt, 13, 17, 67, 0x808080);
pref_menu.auto_link_blank.on.onRelease = function() {
    this._visible = false;
    auto_link_blank = false;
    auto_link_so.data._blank = false;
    auto_link_so.flush();
};
pref_menu.auto_link_blank.off.onRelease = function() {
    this._parent.on._visible = true;
    auto_link_blank = true;
    auto_link_so.data._blank = true;
    auto_link_so.flush();
};
createToggleBtn(pref_menu, "show_info", "スクリーンに情報表示", black12_fmt, 15, 210, 67, 0x808080);
createToggleBtn(pref_menu, "add_id_overlay", "動画上にID表示", black12_fmt, 18, 17, 92, 0x808080);
pref_menu.add_id_overlay.on.onRelease = function() {
    this._visible = false;
    add_id_overlay = false;
    add_id_overlay_so.data.flag = false;
    add_id_overlay_so.flush();
};
pref_menu.add_id_overlay.off.onRelease = function() {
    this._parent.on._visible = true;
    add_id_overlay = true;
    add_id_overlay_so.data.flag = true;
    add_id_overlay_so.flush();
};
createToggleBtn(pref_menu, "add_id", "ログリストにID表示", black12_fmt, 19, 210, 92, 0x808080);
pref_menu.add_id.on.onRelease = function() {
    this._visible = false;
    add_id = false;
    add_id_so.data.flag = false;
    add_id_so.flush();
    if (list_mode == "normal") {
        updateLogList("normal");
    } else {
        updateLogList("cand_ng_id");
    }
    updateLogList("nicos");
    updateLogList("ownerthread");
};
pref_menu.add_id.off.onRelease = function() {
    this._parent.on._visible = true;
    add_id = true;
    add_id_so.data.flag = true;
    add_id_so.flush();
    if (list_mode == "normal") {
        updateLogList("normal");
    } else {
        updateLogList("cand_ng_id");
    }
    updateLogList("nicos");
    updateLogList("ownerthread");
};
createToggleBtn(pref_menu, "wide_seek_bar", "太いシークバー", black12_fmt, 22, 17, 117, 0x808080);
pref_menu.wide_seek_bar.on.onRelease = function() {
    this._visible = false;
    nico.controller.seek_bar._height -= 6;
    nico.controller.seek_bar._y += 3;
    nico.controller.loaded._height -= 6;
    nico.controller.loaded._y += 3;
    wide_seek_bar = false;
    wide_seek_bar_so.data.flag = false;
    wide_seek_bar_so.flush();
};
pref_menu.wide_seek_bar.off.onRelease = function() {
    this._parent.on._visible = true;
    nico.controller.seek_bar._height += 6;
    nico.controller.seek_bar._y -= 3;
    nico.controller.loaded._height += 6;
    nico.controller.loaded._y -= 3;
    wide_seek_bar = true;
    wide_seek_bar_so.data.flag = true;
    wide_seek_bar_so.flush();
};
createToggleBtn(pref_menu, "clip_height", "ログリストを縮める", black12_fmt, 23, 210, 117, 0x808080);
pref_menu.clip_height.on.onRelease = function() {
    this._visible = false;
    nico.tabmenu._height += 16;
    loglist_menu._y += 2;
    nico.tabmenu._y -= 2;
    clip_height = false;
    clip_height_so.data.flag = false;
    clip_height_so.flush();
};
pref_menu.clip_height.off.onRelease = function() {
    this._parent.on._visible = true;
    nico.tabmenu._height -= 16;
    loglist_menu._y -= 2;
    nico.tabmenu._y += 2;
    clip_height = true;
    clip_height_so.data.flag = true;
    clip_height_so.flush();
};
//createToggleBtn(pref_menu,"use_javascript","JavaScriptを使う",black12_fmt,24,17,142,0x808080);
//createToggleBtn(pref_menu,"auto_scroll_loglist","ログリストを自動スクロール",black12_fmt,25,210,142,0x808080);
createToggleBtn(pref_menu, "forbid_relation", "再生後オススメタブへ移動しない", black12_fmt, 26, 17, 142, 0x808080);
createToggleBtn(pref_menu, "change_title", "<title>タグをいぢる", black12_fmt, 27, 210, 142, 0x808080);
createToggleBtn(pref_menu, "hide_header", "ヘッダ部を消去", black12_fmt, 30, 17, 197, 0x808080);
pref_menu.hide_header.off.onRelease = function() {
    this._parent.on._visible = true;
    if (transparent_header) {
        pref_menu.transparent_header.on.onRelease();
    }
    hide_header = true;
    hide_header_so.data.flag = true;
    hide_header_so.flush();
};
createToggleBtn(pref_menu, "push_out_inputarea", "入力部を押し出す", black12_fmt, 31, 140, 197, 0x808080);
pref_menu.push_out_inputarea.off.onRelease = function() {
    this._parent.on._visible = true;
    if (transparent_inputarea) {
        pref_menu.transparent_inputarea.on.onRelease();
    }
    push_out_inputarea = true;
    push_out_inputarea_so.data.flag = true;
    push_out_inputarea_so.flush();
};
createToggleBtn(pref_menu, "transparent_header", "ヘッダ部を透明化", black12_fmt, 32, 17, 222, 0x808080);
pref_menu.transparent_header.on.onRelease = function() {
    this._visible = false;
    if (!transparent_inputarea) {
        pref_menu.label_inputarea_alpha._visible = false;
        pref_menu.input_inputarea_alpha._visible = false;
        pref_menu.label_timed_hide_timelimit._visible = false;
        pref_menu.input_timed_hide_timelimit._visible = false;
        showMouse();
        showUI();
    }
    transparent_header = false;
    transparent_header_so.data.flag = false;
    transparent_header_so.flush();
    timed_hide_header = false;
};
pref_menu.transparent_header.off.onRelease = function() {
    this._parent.on._visible = true;
    if (hide_header) {
        pref_menu.hide_header.on.onRelease();
    }
    pref_menu.label_inputarea_alpha._visible = true;
    pref_menu.input_inputarea_alpha._visible = true;
    pref_menu.label_timed_hide_timelimit._visible = true;
    pref_menu.input_timed_hide_timelimit._visible = true;
    transparent_header = true;
    transparent_header_so.data.flag = true;
    transparent_header_so.flush();
    timed_hide_header = true;
};
createToggleBtn(pref_menu, "transparent_inputarea", "入力部を透明化", black12_fmt, 33, 140, 222, 0x808080);
pref_menu.transparent_inputarea.on.onRelease = function() {
    this._visible = false;
    if (!transparent_header) {
        pref_menu.label_inputarea_alpha._visible = false;
        pref_menu.input_inputarea_alpha._visible = false;
        pref_menu.label_timed_hide_timelimit._visible = false;
        pref_menu.input_timed_hide_timelimit._visible = false;
        showMouse();
        showUI();
    }
    transparent_inputarea = false;
    transparent_inputarea_so.data.flag = false;
    transparent_inputarea_so.flush();
    timed_hide_inputarea = false;
};
pref_menu.transparent_inputarea.off.onRelease = function() {
    this._parent.on._visible = true;
    if (push_out_inputarea) {
        pref_menu.push_out_inputarea.on.onRelease();
    }
    pref_menu.label_inputarea_alpha._visible = true;
    pref_menu.input_inputarea_alpha._visible = true;
    pref_menu.label_timed_hide_timelimit._visible = true;
    pref_menu.input_timed_hide_timelimit._visible = true;
    transparent_inputarea = true;
    transparent_inputarea_so.data.flag = true;
    transparent_inputarea_so.flush();
    timed_hide_inputarea = true;
};
createToggleBtn(pref_menu, "change_bgcolor", "背景を黒くする", black12_fmt, 35, 17, 252, 0x808080);
createToggleBtn(pref_menu, "first_time_full", "再生開始時最大化", black12_fmt, 36, 17, 280, 0x808080);
createToggleBtn(pref_menu, "end_time_normal", "再生終了時最小化", black12_fmt, 37, 140, 280, 0x808080);
createToggleBtn(pref_menu, 'autopop_cm', 'CMでマーキーを自動表示', black12_fmt, 40, 17, 312, 0x808080);
pref_menu.autopop_cm.on.onRelease = function() {
    pref_menu.autopop_cm.on._visible = false;
    autopop_cm_so.data.flag = false;
    autopop_cm_so.flush();
    pref_menu.label_cm_inputarea_alpha._visible = false;
    pref_menu.input_cm_inputarea_alpha._visible = false;
};
pref_menu.autopop_cm.off.onRelease = function() {
    pref_menu.autopop_cm.on._visible = true;
    autopop_cm_so.data.flag = true;
    autopop_cm_so.flush();
    pref_menu.label_cm_inputarea_alpha._visible = true;
    pref_menu.input_cm_inputarea_alpha._visible = true;
};
createToggleBtn(pref_menu, 'design_mode0', '本家デザイン', black12_fmt, 42, 17, 336, 0x808080);
createToggleBtn(pref_menu, 'design_mode1', 'ニコ割あり(540px)', black12_fmt, 43, 110, 336, 0x808080);
createToggleBtn(pref_menu, 'design_mode2', 'ニコ割あり(510px)', black12_fmt, 44, 230, 336, 0x808080);
pref_menu.design_mode0.on.onRelease = function() {
    pref_menu.design_mode0.on._visible = true;
    pref_menu.design_mode1.on._visible = false;
    pref_menu.design_mode2.on._visible = false;
    design_mode0_so.data.flag = true;
    design_mode1_so.data.flag = false;
    design_mode2_so.data.flag = false;
    design_mode0_so.flush();
    design_mode1_so.flush();
    design_mode2_so.flush();
};
pref_menu.design_mode0.off.onRelease = function() {
    pref_menu.design_mode0.on.onRelease();
};
pref_menu.design_mode1.on.onRelease = function() {
    pref_menu.design_mode0.on._visible = false;
    pref_menu.design_mode1.on._visible = true;
    pref_menu.design_mode2.on._visible = false;
    design_mode0_so.data.flag = false;
    design_mode1_so.data.flag = true;
    design_mode2_so.data.flag = false;
    design_mode0_so.flush();
    design_mode1_so.flush();
    design_mode2_so.flush();
};
pref_menu.design_mode1.off.onRelease = function() {
    pref_menu.design_mode1.on.onRelease();
};
pref_menu.design_mode2.on.onRelease = function() {
    pref_menu.design_mode0.on._visible = false;
    pref_menu.design_mode1.on._visible = false;
    pref_menu.design_mode2.on._visible = true;
    design_mode0_so.data.flag = false;
    design_mode1_so.data.flag = false;
    design_mode2_so.data.flag = true;
    design_mode0_so.flush();
    design_mode1_so.flush();
    design_mode2_so.flush();
};
pref_menu.design_mode2.off.onRelease = function() {
    pref_menu.design_mode2.on.onRelease();
};
/*再生タブ  50*/
createToggleBtn(pref_menu, "auto_play", "自動再生許可", black12_fmt, 50, 17, 42, 0x808080);
pref_menu.auto_play.on.onRelease = function() {
    auto_play = false;
    auto_play_so.data.flag = false;
    pref_menu.auto_play.on._visible = false;
    nico.autoPlay_so.data.flag = false;
    nico.System_menu.autoPlayCheckBox.selected = false;
    nico.autoPlay_so.flush();
    auto_play_so.flush();
};
pref_menu.auto_play.off.onRelease = function() {
    auto_play = true;
    auto_play_so.data.flag = true;
    pref_menu.auto_play.on._visible = true;
    nico.autoPlay_so.data.flag = true;
    nico.System_menu.autoPlayCheckBox.selected = true;
    nico.autoPlay_so.flush();
    auto_play_so.flush();
};
createToggleBtn(pref_menu, "auto_repeat", "リピート再生", black12_fmt, 51, 122, 42, 0x808080);
pref_menu.auto_repeat.on.onRelease = function() {
    this._visible = false;
    pref_menu.end_time._visible = false;
    auto_repeat = false;
    auto_repeat_status = "ready";
    clearInterval(repeat_timerID);
    auto_repeat_so.data.flag = false;
    auto_repeat_so.flush();
};
pref_menu.auto_repeat.off.onRelease = function() {
    this._parent.on._visible = true;
    pref_menu.end_time._visible = true;
    auto_repeat = true;
    auto_repeat_status = "ready";
    clearInterval(repeat_timerID);
    setAutoRepeatInterval();
    auto_repeat_so.data.flag = true;
    auto_repeat_so.flush();
};
createSquareBtn(pref_menu, "end_time", "→リピートの終点を指定", white12b_fmt, 52, 273, 42, 140, 18, 0x303030);
pref_menu.end_time.onRelease = function() {
    createEndTimeInput();
};
createToggleBtn(pref_menu, "auto_smoothing", "低画質のみスムージング", black12_fmt, 53, 17, 67, 0x808080);
pref_menu.auto_smoothing.on.onRelease = function() {
    this._visible = false;
    if (!smoothing) {
        changeSmoothing(true, true);
    }
    auto_smoothing = false;
    auto_smoothing_so.data.flag = false;
    auto_smoothing_so.flush();
};
pref_menu.auto_smoothing.off.onRelease = function() {
    this._parent.on._visible = true;
    if (auto_smoothing_off) {
        pref_menu.auto_smoothing_off.on.onRelease();
    }
    if (smoothing && nico.player.videoStream_width % 512 == 0 && (nico.player.videoStream_height % 384 == 0 || nico.player.videoStream_height % 288 == 0)) {
        changeSmoothing(false, true);
    }
    auto_smoothing = true;
    auto_smoothing_so.data.flag = true;
    auto_smoothing_so.flush();
};
createToggleBtn(pref_menu, "auto_smoothing_off", "スムージングしない", black12_fmt, 54, 200, 67, 0x808080);
pref_menu.auto_smoothing_off.on.onRelease = function() {
    this._visible = false;
    if (!smoothing) {
        changeSmoothing(true, true);
    }
    auto_smoothing_off = false;
    auto_smoothing_off_so.data.flag = false;
    auto_smoothing_off_so.flush();
};
pref_menu.auto_smoothing_off.off.onRelease = function() {
    this._parent.on._visible = true;
    if (auto_smoothing) {
        pref_menu.auto_smoothing.on.onRelease();
    }
    if (smoothing) {
        changeSmoothing(false, true);
    }
    auto_smoothing_off = true;
    auto_smoothing_off_so.data.flag = true;
    auto_smoothing_off_so.flush();
};
createToggleBtn(pref_menu, "smoothing", "スムージングをON", black12_fmt, 55, 17, 92, 0x808080);
pref_menu.smoothing.on.onRelease = function() {
    this._visible = false;
    changeSmoothing(false, true);
};
pref_menu.smoothing.off.onRelease = function() {
    this._parent.on._visible = true;
    changeSmoothing(true, true);
};
createToggleBtn(pref_menu, "local_server", "ローカルサーバーを使う", black12_fmt, 56, 17, 117, 0x808080);
createToggleBtn(pref_menu, "use_flv_booster", "flv_booster(コントラスト・輝度調節)を使う  (次回読込時に反映)", black12_fmt, 57, 17, 187, 0x808080);
pref_menu.use_flv_booster.on.onRelease = function() {
    this._visible = false;
    flv_booster._visible = false;
    use_flv_booster = false;
    flv_booster_so.data.flag = false;
    flv_booster_so.flush();
};
pref_menu.use_flv_booster.off.onRelease = function() {
    this._parent.on._visible = true;
    if (!flv_booster_load) {
        if (useswfversion >= 7) {
            flv_booster_load = true;
            flv_booster_mcl.loadClip("flv_booster.swf?target_mc=" + flv_booster_target_mc, flv_booster);
        } else {
            flv_booster_load = true;
            flv_booster.loadMovie("flv_booster.swf?target_mc=" + flv_booster_target_mc);
        }
    }
    flv_booster._visible = true;
    use_flv_booster = true;
    flv_booster_so.data.flag = true;
    flv_booster_so.flush();
};
createToggleBtn(pref_menu, 'load_marquee', 'マーキを読込む(時報・ニュース・ニコ割など)', black12_fmt, 58, 17, 212, 0x808080);
createToggleBtn(pref_menu, 'load_hiroba', '広場情報を読込む(広場アイコンをクリック)', black12_fmt, 59, 17, 237, 0x808080);
createToggleBtn(pref_menu, 'load_NiconiCM', 'ニコニ広告の提供を表示する', black12_fmt, 60, 17, 262, 0x808080);
pref_menu.load_NiconiCM.on.onRelease = function() {
    load_NiconiCM = false;
    load_NiconiCM_so.data.flag = false;
    pref_menu.load_NiconiCM.on._visible = false;
    load_NiconiCM_so.flush();
};
pref_menu.load_NiconiCM.off.onRelease = function() {
    load_NiconiCM = true;
    load_NiconiCM_so.data.flag = true;
    pref_menu.load_NiconiCM.on._visible = true;
    load_NiconiCM_so.flush();
};
createToggleBtn(pref_menu, 'hide_icon_cm', '＠CMアイコンを隠す', black12_fmt, 65, 17, 287, 0x808080);
pref_menu.hide_icon_cm.on.onRelease = function() {
    hide_icon_cm = false;
    hide_icon_cm_so.data.flag = false;
    pref_menu.hide_icon_cm.on._visible = false;
    hide_icon_cm_so.flush();
};
pref_menu.hide_icon_cm.off.onRelease = function() {
    hide_icon_cm = true;
    hide_icon_cm_so.data.flag = true;
    pref_menu.hide_icon_cm.on._visible = true;
    hide_icon_cm_so.flush();
};
/*コメントタブ 70*/
createToggleBtn(pref_menu, "hide_comment", "開始時にコメント非表示", black12_fmt, 70, 17, 42, 0x808080);
createToggleBtn(pref_menu, "change_maintab", "開始時にシステムタブを表示", black12_fmt, 71, 180, 42, 0x808080);
createToggleBtn(pref_menu, "hide_log", "コメント非表示時ログリストも隠す", black12_fmt, 72, 17, 67, 0x808080);
createToggleBtn(pref_menu, "pass_through_message_filter", "投稿者フィルターを透過  (次回読込時に反映)", black12_fmt, 73, 17, 92, 0x808080);
createToggleBtn(pref_menu, "disable_nicoscript", "ニコスクリプトを無効にする  (次回読込時に反映)", black12_fmt, 74, 17, 117, 0x808080);
createToggleBtn(pref_menu, "resMax_overwrite", "コメント保持数制御  (0で無制限)", black12_fmt, 75, 17, 142, 0x808080);
pref_menu.resMax_overwrite.on.onRelease = function() {
    this._visible = false;
    pref_menu.input_resMax_overwrite_num._visible = false;
    resMax = nico.resMax;
    resMax_overwrite = false;
    resMax_overwrite_so.data.flag = false;
    resMax_overwrite_so.flush();
};
pref_menu.resMax_overwrite.off.onRelease = function() {
    this._parent.on._visible = true;
    pref_menu.input_resMax_overwrite_num._visible = true;
    resMax = resMax_overwrite_num;
    resMax_overwrite = true;
    resMax_overwrite_so.data.flag = true;
    resMax_overwrite_so.flush();
};
createToggleBtn(pref_menu, "transparent_comment", "コメントの透明度を指定", black12_fmt, 76, 17, 167, 0x808080);
pref_menu.transparent_comment.on.onRelease = function() {
    this._visible = false;
    pref_menu.input_comment_alpha._visible = false;
    transparent_comment = false;
    transparent_comment_so.data.flag = false;
    transparent_comment_so.flush();
};
pref_menu.transparent_comment.off.onRelease = function() {
    this._parent.on._visible = true;
    pref_menu.input_comment_alpha._visible = true;
    transparent_comment = true;
    transparent_comment_so.data.flag = true;
    transparent_comment_so.flush();
};
createToggleBtn(pref_menu, "hold_connect_board", "コメント詰まり対策", black12_fmt, 77, 200, 167, 0x808080);
createToggleBtn(pref_menu, "hide_comment_with_filter", "フィルターにかかるコメントを非表示 (次回読込時に反映)", black12_fmt, 78, 17, 193, 0x808080);
createToggleBtn(pref_menu, "filter1", "", black12_fmt, 80, 17, 247, 0x808080);
if (!filter1_on) {
    pref_menu.filter1.on._visible = false;
}
pref_menu.filter1.on.onRelease = function() {
    this._visible = false;
    filter_so.data.filter1_flag = false;
    filter_so.flush();
};
pref_menu.filter1.off.onRelease = function() {
    this._parent.on._visible = true;
    filter_so.data.filter1_flag = true;
    filter_so.flush();
};
createToggleBtn(pref_menu, "filter2", "", black12_fmt, 81, 17, 267, 0x808080);
if (!filter2_on) {
    pref_menu.filter2.on._visible = false;
}
pref_menu.filter2.on.onRelease = function() {
    this._visible = false;
    filter_so.data.filter2_flag = false;
    filter_so.flush();
};
pref_menu.filter2.off.onRelease = function() {
    this._parent.on._visible = true;
    filter_so.data.filter2_flag = true;
    filter_so.flush();
};
createToggleBtn(pref_menu, "filter3", "", black12_fmt, 82, 17, 287, 0x808080);
if (!filter3_on) {
    pref_menu.filter3.on._visible = false;
}
pref_menu.filter3.on.onRelease = function() {
    this._visible = false;
    filter_so.data.filter3_flag = false;
    filter_so.flush();
};
pref_menu.filter3.off.onRelease = function() {
    this._parent.on._visible = true;
    filter_so.data.filter3_flag = true;
    filter_so.flush();
};
createToggleBtn(pref_menu, "filter4", "", black12_fmt, 83, 17, 307, 0x808080);
if (!filter4_on) {
    pref_menu.filter4.on._visible = false;
}
pref_menu.filter4.on.onRelease = function() {
    this._visible = false;
    filter_so.data.filter4_flag = false;
    filter_so.flush();
};
pref_menu.filter4.off.onRelease = function() {
    this._parent.on._visible = true;
    filter_so.data.filter4_flag = true;
    filter_so.flush();
};
createSquareBtn(pref_menu, "apply_filter", "→今すぐ適用", white12b_fmt, 84, 270, 227, 90, 18, 0x303030);
pref_menu.apply_filter.onRelease = function() {
    custom_filter_message_count = 0;
    updateFilter("clear_filter");
    filter1_flag = new Array();
    filter2_flag = new Array();
    filter3_flag = new Array();
    filter4_flag = new Array();
    loadCustomFilter();
    updateLogList("clear");
    clearEmphMes("both");
    showInfoOnMainBar("フィルターの変更を適用しました");
};
//kakikomi
createToggleBtn(pref_menu, "apply_kakikomi", "カキコミを記録する(次回読込時に反映)", black12_fmt, 90, 17, 330, 0x808080);
/*操作タブ*/
createToggleBtn(pref_menu, "copy_to_clip_board", "コメントIDをコピー", black12_fmt, 100, 17, 42, 0x808080);
createToggleBtn(pref_menu, "copy_message_to_clip_board", "コメント本文をコピー", black12_fmt, 101, 17, 67, 0x808080);
createToggleBtn(pref_menu, "copy_title", "DL時タイトルをコピー", black12_fmt, 102, 200, 42, 0x808080);
createToggleBtn(pref_menu, "download_blank", "別窓でDLする(エラー対策)", black12_fmt, 103, 200, 67, 0x808080);
createToggleBtn(pref_menu, "always_back_to_normal_mode", "強調モードから逐一通常モードに戻る(重いかも)", black12_fmt, 104, 17, 92, 0x808080);
createToggleBtn(pref_menu, "kill_enter", "コメントをEnterで送信しない(Ctrl+Enterで送信)", black12_fmt, 105, 17, 117, 0x808080);
createToggleBtn(pref_menu, "mouse_wheel", "ホイールシーク", black12_fmt, 106, 17, 147, 0x808080);
pref_menu.mouse_wheel.on.onRelease = function() {
    this._visible = false;
    pref_menu.mouse_reverse._visible = false;
    mouse_wheel = false;
    mouse_wheel_so.data.flag = false;
    mouse_wheel_so.flush();
};
pref_menu.mouse_wheel.off.onRelease = function() {
    this._parent.on._visible = true;
    if (wheel_volume) {
        pref_menu.wheel_volume.on.onRelease();
    }
    pref_menu.mouse_reverse._visible = true;
    if (mouse_reverse) {
        pref_menu.mouse_reverse.on._visible = true;
    } else {
        pref_menu.mouse_reverse.on._visible = false;
    }
    mouse_wheel = true;
    mouse_wheel_so.data.flag = true;
    mouse_wheel_so.flush();
};
createToggleBtn(pref_menu, "mouse_reverse", "逆回転", black12_fmt, 107, 132, 147, 0x808080);
pref_menu.mouse_reverse.on.onRelease = function() {
    this._visible = false;
    mouse_reverse = false;
    mouse_wheel_so.data.reverse = false;
    mouse_wheel_so.flush();
};
pref_menu.mouse_reverse.off.onRelease = function() {
    this._parent.on._visible = true;
    mouse_reverse = true;
    mouse_wheel_so.data.reverse = true;
    mouse_wheel_so.flush();
};
createToggleBtn(pref_menu, "wheel_volume", "ホイールで音量調節", black12_fmt, 108, 17, 172, 0x808080);
pref_menu.wheel_volume.off.onRelease = function() {
    this._parent.on._visible = true;
    if (mouse_wheel) {
        pref_menu.mouse_wheel.on.onRelease();
    }
    wheel_volume = true;
    wheel_volume_so.data.flag = true;
    wheel_volume_so.flush();
};
createToggleBtn(pref_menu, "force_seek", "強引にシークする", black12_fmt, 110, 17, 197, 0x808080);
createToggleBtn(pref_menu, "click_pause", "動画クリックで一時停止", black12_fmt, 112, 17, 222, 0x808080);
createToggleBtn(pref_menu, "double_click_fullscreen", "ダブルクリックで最大化", black12_fmt, 113, 17, 247, 0x808080);
createToggleBtn(pref_menu, "click_ime_off", "IMEを画面クリックでOFF", black12_fmt, 114, 17, 272, 0x808080);
/*デバッグタブ*/
createToggleBtn(pref_menu, "key_operation", "キーボード操作", black12_fmt, 120, 17, 42, 0x808080);
createToggleBtn(pref_menu, "test_mode", "テストモード", black12_fmt, 140, 200, 342, 0x808080);
//その他のラベルとか入力エリアとか
pref_menu.createTextField("label_version", 150, 140, 5, 1, 1);
pref_menu.createTextField("input_server_name", 160, 30, 130, 300, 17);
pref_menu.createTextField("input_server_index", 170, 30, 150, 300, 17);
pref_menu.createTextField("label_mouse_backward", 180, 210, 138, 1, 1);
pref_menu.createTextField("input_mouse_backward", 190, 240, 138, 30, 17);
pref_menu.createTextField("label_mouse_forward", 200, 270, 138, 1, 1);
pref_menu.createTextField("input_mouse_forward", 210, 300, 138, 30, 17);
pref_menu.createTextField("label_filter", 220, 10, 217, 1, 1);
pref_menu.createTextField("input_filter1_name", 230, 30, 237, 25, 17);
pref_menu.createTextField("input_filter1_commands", 240, 60, 237, 290, 17);
pref_menu.createTextField("input_filter2_name", 250, 30, 257, 25, 17);
pref_menu.createTextField("input_filter2_commands", 260, 60, 257, 290, 17);
pref_menu.createTextField("input_filter3_name", 270, 30, 277, 25, 17);
pref_menu.createTextField("input_filter3_commands", 280, 60, 277, 290, 17);
pref_menu.createTextField("input_filter4_name", 290, 30, 297, 25, 17);
pref_menu.createTextField("input_filter4_commands", 300, 60, 297, 290, 17);
pref_menu.createTextField("input_resMax_overwrite_num", 310, 200, 133, 40, 17);
pref_menu.createTextField("label_wheel_volume_value", 320, 235, 163, 1, 1);
pref_menu.createTextField("input_wheel_volume_value", 330, 300, 163, 30, 17);
//pref_menu.createTextField("input_flv_booster_url",340,30,200,300,17);
pref_menu.createTextField("label_key_operation_list", 350, 24, 49, 1, 1);
pref_menu.label_key_operation_list.text = "←→ ： シーク\n↑↓ ： 音量\nSpace ： 停止・再生\nBackSpace ： 先頭に戻る\nEnter ： 最大化・解除\nC ： コマンドバー表示・非表示\nH ： コメント表示・非表示\nR ： リピート ON/OFF\nM ： ミュート ON/OFF\nS ： スムージング ON/OFF\nT ： サムネイルON/OFF\nQ : QuickNGWord ON/OFF\nShift : ヘッダの透明化を使用時にヘッダや入力部を非表示/表示\nctrl : コメント入力部にフォーカスします。";
pref_menu.label_key_operation_list.type = "dynamic";
pref_menu.label_key_operation_list.border = false;
pref_menu.label_key_operation_list.selectable = false;
pref_menu.label_key_operation_list.background = false;
pref_menu.label_key_operation_list.autoSize = true;
pref_menu.label_key_operation_list.tabEnabled = false;
pref_menu.label_key_operation_list.setTextFormat(black11_fmt);
pref_menu.createTextField("label_pref_on_fullscreen", 360, 8, 164, 1, 1);
pref_menu.label_pref_on_fullscreen.text = "最大化時の設定  (次回最大化時に反映)";
pref_menu.label_pref_on_fullscreen.type = "dynamic";
pref_menu.label_pref_on_fullscreen.border = false;
pref_menu.label_pref_on_fullscreen.selectable = false;
pref_menu.label_pref_on_fullscreen.background = false;
pref_menu.label_pref_on_fullscreen.autoSize = true;
pref_menu.label_pref_on_fullscreen.tabEnabled = false;
pref_menu.label_pref_on_fullscreen.setTextFormat(black12_fmt);
pref_menu.createTextField("label_inputarea_alpha", 370, 258, 213, 1, 1);
pref_menu.createTextField("input_inputarea_alpha", 380, 315, 213, 30, 17);
pref_menu.createTextField("label_cm_inputarea_alpha", 420, 258, 302, 1, 1);
pref_menu.createTextField("input_cm_inputarea_alpha", 430, 315, 302, 30, 17);
pref_menu.createTextField("label_timed_hide_timelimit", 390, 258, 235, 1, 1);
pref_menu.createTextField("input_timed_hide_timelimit", 400, 315, 235, 30, 17);
pref_menu.createTextField("input_comment_alpha", 410, 152, 158, 30, 17);
//大量にあるのでループで設定
for (var o in pref_menu) {
    var t;
    switch (o) {
    case "input_server_name":
        t = local_server_name[0];
        break;
    case "input_server_index":
        t = local_server_index[0];
        break;
    case "label_mouse_backward":
        t = "後退";
        break;
    case "input_mouse_backward":
        t = mouse_backward;
        break;
    case "label_mouse_forward":
        t = "前進";
        break;
    case "input_mouse_forward":
        t = mouse_forward;
        break;
    case "label_filter":
        t = "カスタムフィルター  (次回読込時に反映)";
        break;
    case "input_filter1_name":
        t = filter1_name;
        break;
    case "input_filter1_commands":
        t = filter1_commands;
        break;
    case "input_filter2_name":
        t = filter2_name;
        break;
    case "input_filter2_commands":
        t = filter2_commands;
        break;
    case "input_filter3_name":
        t = filter3_name;
        break;
    case "input_filter3_commands":
        t = filter3_commands;
        break;
    case "input_filter4_name":
        t = filter4_name;
        break;
    case "input_filter4_commands":
        t = filter4_commands;
        break;
    case "label_version":
        t = version;
        break;
    case "input_resMax_overwrite_num":
        t = resMax_overwrite_num;
        break;
    case "label_wheel_volume_value":
        t = "音量調節量";
        break;
    case "input_wheel_volume_value":
        t = wheel_volume_value;
        break;
        //case "input_flv_booster_url" : t = flv_booster_url; break;
    case "label_inputarea_alpha":
        t = "透明度";
        break;
    case "input_inputarea_alpha":
        t = inputarea_alpha;
        break;
    case "label_cm_inputarea_alpha":
        t = "透明度";
        break;
    case "input_cm_inputarea_alpha":
        t = cm_inputarea_alpha;
        break;
    case "label_timed_hide_timelimit":
        t = "表示時間";
        break;
    case "input_timed_hide_timelimit":
        t = timed_hide_timelimit;
        break;
    case "input_comment_alpha":
        t = comment_alpha;
        break;
    default:
        t = undefined;
    }
    if (t != undefined && o.substr(0, 6) == "label_") {
        pref_menu[o].text = t;
        pref_menu[o].type = "dynamic";
        pref_menu[o].border = false;
        pref_menu[o].selectable = false;
        pref_menu[o].background = false;
        pref_menu[o].autoSize = true;
        pref_menu[o].tabEnabled = false;
        pref_menu[o].setTextFormat(black12_fmt);
    } else if (t != undefined && o.substr(0, 6) == "input_") {
        pref_menu[o].text = t;
        pref_menu[o].type = "input";
        pref_menu[o].border = true;
        pref_menu[o].background = false;
        pref_menu[o].autoSize = false;
        pref_menu[o].tabEnabled = true;
        pref_menu[o].setTextFormat(black12_fmt);
    }
}
pref_menu.input_comment_alpha.onChanged = function() {
    comment_alpha = Number(pref_menu.input_comment_alpha.text);
    transparent_comment_so.data.alpha = pref_menu.input_comment_alpha.text;
    transparent_comment_so.flush();
};
pref_menu.input_resMax_overwrite_num.onChanged = function() {
    resMax_overwrite_num = Number(pref_menu.input_resMax_overwrite_num.text);
    resMax = resMax_overwrite_num;
    resMax_overwrite_so.data.num = pref_menu.input_resMax_overwrite_num.text;
    resMax_overwrite_so.flush();
};
pref_menu.input_wheel_volume_value.onChanged = function() {
    wheel_volume_value = Number(pref_menu.input_wheel_volume_value.text);
    wheel_volume_so.data.value = pref_menu.input_wheel_volume_value.text;
    wheel_volume_so.flush();
};
//pref_menu.input_flv_booster_url.onChanged = function(){
//  flv_booster_url = pref_menu.input_flv_booster_url.text;
//  flv_booster_so.data.url = pref_menu.input_flv_booster_url.text;
//  flv_booster_so.flush();
//};
pref_menu.input_inputarea_alpha.onChanged = function() {
    inputarea_alpha = Number(pref_menu.input_inputarea_alpha.text);
    transparent_inputarea_so.data.alpha = pref_menu.input_inputarea_alpha.text;
    transparent_inputarea_so.flush();
};
pref_menu.input_cm_inputarea_alpha.onChanged = function() {
    cm_inputarea_alpha = Number(pref_menu.input_cm_inputarea_alpha.text);
    cm_transparent_inputarea_so.data.alpha = pref_menu.input_cm_inputarea_alpha.text;
    cm_transparent_inputarea_so.flush();
};
pref_menu.input_timed_hide_timelimit.onChanged = function() {
    timed_hide_timelimit = Number(pref_menu.input_timed_hide_timelimit.text);
    timed_hide_timelimit_so.data.value = pref_menu.input_timed_hide_timelimit.text;
    timed_hide_timelimit_so.flush();
};
pref_menu.input_mouse_backward.onChanged = function() {
    mouse_backward = Number(pref_menu.input_mouse_backward.text);
    mouse_wheel_so.data.backward = pref_menu.input_mouse_backward.text;
    mouse_wheel_so.flush();
};
pref_menu.input_mouse_forward.onChanged = function() {
    mouse_forward = Number(pref_menu.input_mouse_forward.text);
    mouse_wheel_so.data.forward = pref_menu.input_mouse_forward.text;
    mouse_wheel_so.flush();
};
pref_menu.input_server_name.onChanged = function() {
    local_server_so.data.name = pref_menu.input_server_name.text;
    if (pref_menu.input_server_index.text == "") {
        local_server_so.data.index = pref_menu.input_server_name.text;
    } else {
        local_server_so.data.index = pref_menu.input_server_index.text;
    }
    local_server_so.flush();
};
pref_menu.input_server_index.onChanged = pref_menu.input_server_name.onChanged;
pref_menu.input_filter1_name.onChanged = function() {
    filter_so.data.filter1_commands = pref_menu.input_filter1_commands.text;
    filter_so.data.filter2_commands = pref_menu.input_filter2_commands.text;
    filter_so.data.filter3_commands = pref_menu.input_filter3_commands.text;
    filter_so.data.filter4_commands = pref_menu.input_filter4_commands.text;
    filter_so.data.filter1_name = pref_menu.input_filter1_name.text.charAt(0);
    filter_so.data.filter2_name = pref_menu.input_filter2_name.text.charAt(0);
    filter_so.data.filter3_name = pref_menu.input_filter3_name.text.charAt(0);
    filter_so.data.filter4_name = pref_menu.input_filter4_name.text.charAt(0);
    filter_so.flush();
};
pref_menu.input_filter2_name.onChanged = pref_menu.input_filter1_name.onChanged;
pref_menu.input_filter3_name.onChanged = pref_menu.input_filter1_name.onChanged;
pref_menu.input_filter4_name.onChanged = pref_menu.input_filter1_name.onChanged;
pref_menu.input_filter1_commands.onChanged = pref_menu.input_filter1_name.onChanged;
pref_menu.input_filter2_commands.onChanged = pref_menu.input_filter1_name.onChanged;
pref_menu.input_filter3_commands.onChanged = pref_menu.input_filter1_name.onChanged;
pref_menu.input_filter4_commands.onChanged = pref_menu.input_filter1_name.onChanged;
function updatePrefMenu(num) {
    updatePrefTab(num, true);
    for (var o in pref_menu) {
        if (o != "base" && o != "label_version" && o.substr(0, 3) != "tab") {
            pref_menu[o]._visible = false;
        }
    }
    pref_menu.label_version._visible = true;
    if (num == 0) {
        pref_menu.auto_link._visible = true;
        if (auto_link) {
            pref_menu.auto_link.on._visible = true;
            pref_menu.auto_display_auto_link._visible = true;
            if (auto_display_auto_link) {
                pref_menu.auto_display_auto_link.on._visible = true;
            } else {
                pref_menu.auto_display_auto_link.on._visible = false;
            }
        } else {
            pref_menu.auto_link.on._visible = false;
        }
        pref_menu.auto_link_blank._visible = true;
        if (auto_link_blank) {
            pref_menu.auto_link_blank.on._visible = true;
        } else {
            pref_menu.auto_link_blank.on._visible = false;
        }
        pref_menu.show_info._visible = true;
        if (show_info) {
            pref_menu.show_info.on._visible = true;
        } else {
            pref_menu.show_info.on._visible = false;
        }
        pref_menu.add_id_overlay._visible = true;
        if (add_id_overlay) {
            pref_menu.add_id_overlay.on._visible = true;
        } else {
            pref_menu.add_id_overlay.on._visible = false;
        }
        pref_menu.add_id._visible = true;
        if (add_id) {
            pref_menu.add_id.on._visible = true;
        } else {
            pref_menu.add_id.on._visible = false;
        }
        pref_menu.clip_height._visible = true;
        if (clip_height) {
            pref_menu.clip_height.on._visible = true;
        } else {
            pref_menu.clip_height.on._visible = false;
        }
        pref_menu.change_title._visible = true;
        if (change_title) {
            pref_menu.change_title.on._visible = true;
        } else {
            pref_menu.change_title.on._visible = false;
        }
        /*
        pref_menu.use_javascript._visible = true;
        if(use_javascript){
            pref_menu.use_javascript.on._visible = true;
        }else{
            pref_menu.use_javascript.on._visible = false;
        }
        */
        pref_menu.label_pref_on_fullscreen._visible = true;
        pref_menu.hide_header._visible = true;
        if (hide_header) {
            pref_menu.hide_header.on._visible = true;
        } else {
            pref_menu.hide_header.on._visible = false;
        }
        pref_menu.transparent_header._visible = true;
        if (transparent_header) {
            pref_menu.transparent_header.on._visible = true;
            pref_menu.label_inputarea_alpha._visible = true;
            pref_menu.input_inputarea_alpha._visible = true;
            pref_menu.label_timed_hide_timelimit._visible = true;
            pref_menu.input_timed_hide_timelimit._visible = true;
        } else {
            pref_menu.transparent_header.on._visible = false;
        }
        pref_menu.push_out_inputarea._visible = true;
        if (push_out_inputarea) {
            pref_menu.push_out_inputarea.on._visible = true;
        } else {
            pref_menu.push_out_inputarea.on._visible = false;
        }
        pref_menu.transparent_inputarea._visible = true;
        if (transparent_inputarea) {
            pref_menu.transparent_inputarea.on._visible = true;
            pref_menu.label_inputarea_alpha._visible = true;
            pref_menu.input_inputarea_alpha._visible = true;
            pref_menu.label_timed_hide_timelimit._visible = true;
            pref_menu.input_timed_hide_timelimit._visible = true;
        } else {
            pref_menu.transparent_inputarea.on._visible = false;
        }
        pref_menu.change_bgcolor._visible = true;
        if (change_bgcolor) {
            pref_menu.change_bgcolor.on._visible = true;
        } else {
            pref_menu.change_bgcolor.on._visible = false;
        }
        pref_menu.first_time_full._visible = true;
        if (first_time_full) {
            pref_menu.first_time_full.on._visible = true;
        } else {
            pref_menu.first_time_full.on._visible = false;
        }
        pref_menu.end_time_normal._visible = true;
        if (end_time_normal) {
            pref_menu.end_time_normal.on._visible = true;
        } else {
            pref_menu.end_time_normal.on._visible = false;
        }
        pref_menu.autopop_cm._visible = true;
        if (autopop_cm_so.data.flag) {
            pref_menu.autopop_cm.on._visible = true;
            pref_menu.label_cm_inputarea_alpha._visible = true;
            pref_menu.input_cm_inputarea_alpha._visible = true;
        } else {
            pref_menu.autopop_cm.on._visible = false;
            pref_menu.label_cm_inputarea_alpha._visible = false;
            pref_menu.input_cm_inputarea_alpha._visible = false;
        }
        pref_menu.design_mode0._visible = true;
        if (design_mode0_so.data.flag) {
            pref_menu.design_mode0.on._visible = true;
        } else {
            pref_menu.design_mode0.on._visible = false;
        }
        pref_menu.design_mode1._visible = true;
        if (design_mode1_so.data.flag) {
            pref_menu.design_mode1.on._visible = true;
        } else {
            pref_menu.design_mode1.on._visible = false;
        }
        pref_menu.design_mode2._visible = true;
        if (design_mode2_so.data.flag) {
            pref_menu.design_mode2.on._visible = true;
        } else {
            pref_menu.design_mode2.on._visible = false;
        }
        /*
        pref_menu.auto_scroll_loglist._visible = true;
        if(auto_scroll_loglist){
            pref_menu.auto_scroll_loglist.on._visible = true;
        }else{
            pref_menu.auto_scroll_loglist.on._visible = false;
        }
        */
        pref_menu.wide_seek_bar._visible = true;
        if (wide_seek_bar) {
            pref_menu.wide_seek_bar.on._visible = true;
        } else {
            pref_menu.wide_seek_bar.on._visible = false;
        }
        pref_menu.forbid_relation._visible = true;
        if (forbid_relation) {
            pref_menu.forbid_relation.on._visible = true;
        } else {
            pref_menu.forbid_relation.on._visible = false;
        }
    }
    if (num == 1) {
        pref_menu.auto_repeat._visible = true;
        if (auto_repeat) {
            pref_menu.auto_repeat.on._visible = true;
            pref_menu.end_time._visible = true;
        } else {
            pref_menu.auto_repeat.on._visible = false;
            pref_menu.end_time._visible = false;
        }
        pref_menu.local_server._visible = true;
        pref_menu.input_server_name._visible = true;
        pref_menu.input_server_index._visible = true;
        if (local_server) {
            pref_menu.local_server.on._visible = true;
        } else {
            pref_menu.local_server.on._visible = false;
        }
        pref_menu.use_flv_booster._visible = true;
        //pref_menu.input_flv_booster_url._visible = true;
        if (use_flv_booster) {
            pref_menu.use_flv_booster.on._visible = true;
        } else {
            pref_menu.use_flv_booster.on._visible = false;
        }
        pref_menu.load_marquee._visible = true;
        if (load_marquee) {
            pref_menu.load_marquee.on._visible = true;
        } else {
            pref_menu.load_marquee.on._visible = false;
        }
        pref_menu.load_hiroba._visible = true;
        if (load_hiroba) {
            pref_menu.load_hiroba.on._visible = true;
        } else {
            pref_menu.load_hiroba.on._visible = false;
        }
        pref_menu.load_NiconiCM._visible = true;
        if (load_NiconiCM) {
            pref_menu.load_NiconiCM.on._visible = true;
        } else {
            pref_menu.load_NiconiCM.on._visible = false;
        }
        pref_menu.hide_icon_cm._visible = true;
        if (hide_icon_cm) {
            pref_menu.hide_icon_cm.on._visible = true;
        } else {
            pref_menu.hide_icon_cm.on._visible = false;
        }
        pref_menu.auto_play._visible = true;
        if (auto_play) {
            pref_menu.auto_play.on._visible = true;
        } else {
            pref_menu.auto_play.on._visible = false;
        }
        /*
        nico.player.autoPlay = auto_play;
        nico.autoPlay_so.data.flag = auto_play;
        nico.System_menu.autoPlayCheckBox.selected = auto_play;
        nico.autoPlay_so.flush();
        */
        pref_menu.auto_smoothing._visible = true;
        if (auto_smoothing) {
            pref_menu.auto_smoothing.on._visible = true;
        } else {
            pref_menu.auto_smoothing.on._visible = false;
        }
        pref_menu.auto_smoothing_off._visible = true;
        if (auto_smoothing_off) {
            pref_menu.auto_smoothing_off.on._visible = true;
        } else {
            pref_menu.auto_smoothing_off.on._visible = false;
        }
        pref_menu.smoothing._visible = true;
        if (smoothing) {
            pref_menu.smoothing.on._visible = true;
        } else {
            pref_menu.smoothing.on._visible = false;
        }
    }
    if (num == 2) {
        pref_menu.hide_comment._visible = true;
        if (hide_comment) {
            pref_menu.hide_comment.on._visible = true;
        } else {
            pref_menu.hide_comment.on._visible = false;
        }
        pref_menu.hide_log._visible = true;
        if (hide_log) {
            pref_menu.hide_log.on._visible = true;
        } else {
            pref_menu.hide_log.on._visible = false;
        }
        pref_menu.change_maintab._visible = true;
        if (change_maintab) {
            pref_menu.change_maintab.on._visible = true;
        } else {
            pref_menu.change_maintab.on._visible = false;
        }
        pref_menu.disable_nicoscript._visible = true;
        if (disable_nicoscript) {
            pref_menu.disable_nicoscript.on._visible = true;
        } else {
            pref_menu.disable_nicoscript.on._visible = false;
        }
        pref_menu.pass_through_message_filter._visible = true;
        if (pass_through_message_filter) {
            pref_menu.pass_through_message_filter.on._visible = true;
        } else {
            pref_menu.pass_through_message_filter.on._visible = false;
        }
        pref_menu.resMax_overwrite._visible = true;
        if (resMax_overwrite) {
            pref_menu.resMax_overwrite.on._visible = true;
            pref_menu.input_resMax_overwrite_num._visible = true;
        } else {
            pref_menu.resMax_overwrite.on._visible = false;
            pref_menu.input_resMax_overwrite_num._visible = false;
        }
        pref_menu.transparent_comment._visible = true;
        if (transparent_comment) {
            pref_menu.transparent_comment.on._visible = true;
            pref_menu.input_comment_alpha._visible = true;
        } else {
            pref_menu.transparent_comment.on._visible = false;
            pref_menu.input_comment_alpha._visible = false;
        }
        pref_menu.hide_comment_with_filter._visible = true;
        if (hide_comment_with_filter) {
            pref_menu.hide_comment_with_filter.on._visible = true;
        } else {
            pref_menu.hide_comment_with_filter.on._visible = false;
        }
        pref_menu.hold_connect_board._visible = true;
        if (hold_connect_board) {
            pref_menu.hold_connect_board.on._visible = true;
        } else {
            pref_menu.hold_connect_board.on._visible = false;
        }
        pref_menu.apply_kakikomi._visible = true;
        if (apply_kakikomi) {
            pref_menu.apply_kakikomi.on._visible = true;
        } else {
            pref_menu.apply_kakikomi.on._visible = false;
        }
        pref_menu.label_filter._visible = true;
        pref_menu.filter1._visible = true;
        pref_menu.input_filter1_name._visible = true;
        pref_menu.input_filter1_commands._visible = true;
        pref_menu.filter2._visible = true;
        pref_menu.input_filter2_name._visible = true;
        pref_menu.input_filter2_commands._visible = true;
        pref_menu.filter3._visible = true;
        pref_menu.input_filter3_name._visible = true;
        pref_menu.input_filter3_commands._visible = true;
        pref_menu.filter4._visible = true;
        pref_menu.input_filter4_name._visible = true;
        pref_menu.input_filter4_commands._visible = true;
        pref_menu.apply_filter._visible = true;
    }
    if (num == 3) {
        pref_menu.copy_to_clip_board._visible = true;
        if (copy_to_clip_board) {
            pref_menu.copy_to_clip_board.on._visible = true;
        } else {
            pref_menu.copy_to_clip_board.on._visible = false;
        }
        pref_menu.copy_message_to_clip_board._visible = true;
        if (copy_message_to_clip_board) {
            pref_menu.copy_message_to_clip_board.on._visible = true;
        } else {
            pref_menu.copy_message_to_clip_board.on._visible = false;
        }
        pref_menu.copy_title._visible = true;
        if (copy_title) {
            pref_menu.copy_title.on._visible = true;
        } else {
            pref_menu.copy_title.on._visible = false;
        }
        pref_menu.download_blank._visible = true;
        if (download_blank) {
            pref_menu.download_blank.on._visible = true;
        } else {
            pref_menu.download_blank.on._visible = false;
        }
        pref_menu.always_back_to_normal_mode._visible = true;
        if (always_back_to_normal_mode) {
            pref_menu.always_back_to_normal_mode.on._visible = true;
        } else {
            pref_menu.always_back_to_normal_mode.on._visible = false;
        }
        pref_menu.kill_enter._visible = true;
        if (kill_enter) {
            pref_menu.kill_enter.on._visible = true;
        } else {
            pref_menu.kill_enter.on._visible = false;
        }
        pref_menu.mouse_wheel._visible = true;
        if (mouse_wheel) {
            pref_menu.mouse_wheel.on._visible = true;
            pref_menu.mouse_reverse._visible = true;
            if (mouse_reverse) {
                pref_menu.mouse_reverse.on._visible = true;
            } else {
                pref_menu.mouse_reverse.on._visible = false;
            }
        } else {
            pref_menu.mouse_wheel.on._visible = false;
            pref_menu.mouse_reverse._visible = false;
            //pref_menu.label_mouse_backward._visible = false;
            //pref_menu.input_mouse_backward._visible = false;
            //pref_menu.label_mouse_forward._visible = false;
            //pref_menu.input_mouse_forward._visible = false;
        }
        pref_menu.wheel_volume._visible = true;
        if (wheel_volume) {
            pref_menu.wheel_volume.on._visible = true;
        } else {
            pref_menu.wheel_volume.on._visible = false;
            //pref_menu.input_wheel_volume_value._visible = false;
        }
        pref_menu.label_mouse_backward._visible = true;
        pref_menu.input_mouse_backward._visible = true;
        pref_menu.label_mouse_forward._visible = true;
        pref_menu.input_mouse_forward._visible = true;
        pref_menu.label_wheel_volume_value._visible = true;
        pref_menu.input_wheel_volume_value._visible = true;
        pref_menu.force_seek._visible = true;
        if (force_seek) {
            pref_menu.force_seek.on._visible = true;
        } else {
            pref_menu.force_seek.on._visible = false;
        }
        pref_menu.click_pause._visible = true;
        if (click_pause) {
            pref_menu.click_pause.on._visible = true;
        } else {
            pref_menu.click_pause.on._visible = false;
        }
        pref_menu.double_click_fullscreen._visible = true;
        if (double_click_fullscreen) {
            pref_menu.double_click_fullscreen.on._visible = true;
        } else {
            pref_menu.double_click_fullscreen.on._visible = false;
        }
        pref_menu.click_ime_off._visible = true;
        if (click_ime_off) {
            pref_menu.click_ime_off.on._visible = true;
        } else {
            pref_menu.click_ime_off.on._visible = false;
        }
    }
    if (num == 4) {
        pref_menu.key_operation._visible = true;
        if (key_operation) {
            pref_menu.key_operation.on._visible = true;
        } else {
            pref_menu.key_operation.on._visible = false;
        }
        pref_menu.label_key_operation_list._visible = true;
        pref_menu.test_mode._visible = true;
        if (test_mode) {
            pref_menu.test_mode.on._visible = true;
        } else {
            pref_menu.test_mode.on._visible = false;
        }
    }
}
function openPrefMenu() {
    pref_menu._visible = true;
}
function closePrefMenu() {
    pref_menu._visible = false;
}
function createEndTimeInput() {
    if (end_time_input == undefined) {
        //closePrefMenu();
        updateNGIDMenu("close");
        createEmptyMovieClip("end_time_input", 29000);
        end_time_input.createEmptyMovieClip("bg", 1);
        end_time_input.bg.lineStyle(1, 0x000000, 100);
        end_time_input.bg.beginFill(0xffffff, 100);
        //      var w = 542;
        var w = nico.controller._width - 1;
        end_time_input.bg.moveTo(-w / 2, -30);
        end_time_input.bg.lineTo(w / 2, -30);
        end_time_input.bg.lineTo(w / 2, 30);
        end_time_input.bg.lineTo(-w / 2, 30);
        end_time_input.bg.lineTo(-w / 2, -30);
        end_time_input.bg.endFill();
        end_time_input.bg.onPress = function() {
            end_time_input.startDrag();
        };
        end_time_input.bg.onRelease = function() {
            end_time_input.stopDrag();
        };
        end_time_input.bg.onReleaseOutside = end_time_input.bg.onRelease;
        end_time_input._x = nico.controller._x + w / 2;
        end_time_input._y = nico.videowindow._y + nico.videowindow._height - 40;
        end_time_input.createEmptyMovieClip("window", 2);
        createSquareBtn(end_time_input.window, "set", "→現在時間をセット→", white12b_fmt, 1, 0, -13, 150, 20, 0x303030);
        end_time_input.window.set.onRelease = function() {
            end_time_input.window.input.text = end_time_input.window.now.text;
            end_time_input.window.input.setTextFormat(red14b_fmt);
        };
        createSquareBtn(end_time_input.window, "apply", "適用", white12b_fmt, 2, -90, 13, 70, 20, 0x303030);
        end_time_input.window.apply.onRelease = function() {
            var check_end_time = Number(end_time_input.window.input.text);
            if (check_end_time > 0) {
                end_time = check_end_time;
            } else {
                return;
            }
            var num_found = false;
            for (var i = 0; i < end_time_ary.length; i++) {
                if (end_time_ary[i].number == VIDEO) {
                    end_time_ary[i].time = end_time;
                    num_found = true;
                    break;
                }
            }
            if (!num_found) {
                end_time_ary.push({
                    number: VIDEO,
                    time: end_time
                });
            }
            auto_repeat_so.data.flag = auto_repeat;
            auto_repeat_so.data.end_time_ary = end_time_ary;
            auto_repeat_so.flush();
            end_time_input.window.input.setTextFormat(black14b_fmt);
        };
        createSquareBtn(end_time_input.window, "del", "クリア", white12b_fmt, 3, 0, 13, 70, 20, 0x303030);
        end_time_input.window.del.onRelease = function() {
            end_time = 0;
            clearInterval(repeat_timerID);
            auto_repeat_status = "ready";
            for (var i = 0; i < end_time_ary.length; i++) {
                if (end_time_ary[i].number == VIDEO) {
                    end_time_ary.splice(i, 1);
                    break;
                }
            }
            auto_repeat_so.data.flag = auto_repeat;
            auto_repeat_so.data.end_time_ary = end_time_ary;
            auto_repeat_so.flush();
            end_time_input.window.input.text = end_time;
            end_time_input.window.input.setTextFormat(black14b_fmt);
        };
        createSquareBtn(end_time_input.window, "close", "閉じる", white12b_fmt, 4, 90, 13, 70, 20, 0x303030);
        end_time_input.window.close.onRelease = function() {
            end_time_input.removeMovieClip();
            //swfversion7でremoveMovieClipがなぜか効かないので応急処置
            end_time_input._visible = false;
            delete timeLine.end_time_input.onEnterFrame;
            Mouse.removeListener(endTimeWheelListener);
        };
        end_time_input.window.createTextField("now", 5, -100, -23, 40, 20);
        end_time_input.window.now.selectable = false;
        end_time_input.window.now.border = false;
        end_time_input.window.now.background = false;
        end_time_input.window.now.autoSize = true;
        end_time_input.window.now.wordWrap = false;
        end_time_input.window.now.text = nico.player.__play__headtime();
        end_time_input.window.now.setTextFormat(black14b_fmt);
        setEndTimeInputInterval();
        end_time_input.window.createTextField("input", 6, 100, -23, 40, 20);
        end_time_input.window.input.selectable = false;
        end_time_input.window.input.border = false;
        end_time_input.window.input.background = false;
        end_time_input.window.input.autoSize = true;
        end_time_input.window.input.wordWrap = false;
        end_time_input.window.input.text = end_time;
        end_time_input.window.input.setTextFormat(black14b_fmt);
        var endTimeWheelListener = new Object();
        endTimeWheelListener.onMouseWheel = function(delta, target) {
            while (target != undefined) {
                if (target == end_time_input) {
                    break;
                }
                target = target._parent;
            }
            if (target == end_time_input) {
                if (delta > 0) {
                    var num = Number(end_time_input.window.input.text) + 0.1;
                } else if (delta < 0) {
                    var num = Number(end_time_input.window.input.text) - 0.1;
                }
                if (num <= 0) {
                    num = 0.1;
                }
                end_time_input.window.input.text = num;
                end_time_input.window.input.setTextFormat(red14b_fmt);
            }
        };
        Mouse.addListener(endTimeWheelListener);
    } else {
        end_time_input._visible = true;
        Mouse.addListener(endTimeWheelListener);
        setEndTimeInputInterval();
    }
}
function createPrefTab(name, num, color) {
    //設定ウィンドウにタブを作る
    //非アクティブになると深度がマイナスになる
    //なんだけどマイナスの深度って消せなくなるんだっけ・・？
    //表示上は問題ないからいいか
    var h = 20;
    var w;
    var depth = 10000 + num;
    var path = _root.pref_menu;
    var tab = path.createEmptyMovieClip("tab" + num, depth);
    tab._visible = true;
    tab.createTextField("info", 1, 0, 0, 100, 20);
    tab.info.type = "dynamic";
    tab.info.border = false;
    tab.info.selectable = false;
    tab.info.background = false;
    tab.info.autoSize = false;
    tab.tabEnabled = false;
    tab.info.text = name;
    tab.info.setTextFormat(black12_fmt);
    tab.info._x = 0 + 6;
    tab.info._y = 0 - tab.info._height;
    tab.info._width = 18 + tab.info.textWidth;
    w = tab.info._width;
    tab.beginFill(color, 100);
    tab.lineStyle(1, 0xf0f0f0, 100);
    tab.moveTo(0, 0);
    tab.lineTo(w, 0);
    tab.lineStyle(1, 0x000000, 100);
    tab.lineTo(w - 5, -h + 2);
    tab.curveTo(w - 5 - 1, -h + 1, w - 5 - 2, -h);
    tab.lineTo(5 + 2, -h);
    tab.curveTo(5 + 1, -h + 1, 5, -h + 2);
    tab.lineTo(0, 0);
    tab.endFill();
    var ol1 = tab.createEmptyMovieClip("over_lay_white", 2);
    ol1._alpha = 0;
    ol1.beginFill(0xffffff, 100);
    ol1.moveTo(0, 0);
    ol1.lineTo(w, 0);
    ol1.lineTo(w - 5, -h + 2);
    ol1.curveTo(w - 5 - 1, -h + 1, w - 5 - 2, -h);
    ol1.lineTo(5 + 2, -h);
    ol1.curveTo(5 + 1, -h + 1, 5, -h + 2);
    ol1.lineTo(0, 0);
    ol1.endFill();
    var ol2 = tab.createEmptyMovieClip("over_lay_black", 3);
    ol2._alpha = 0;
    ol2.beginFill(0x000000, 100);
    ol2.moveTo(0, 0);
    ol2.lineTo(w, 0);
    ol2.lineTo(w - 5, -h + 2);
    ol2.curveTo(w - 5 - 1, -h + 1, w - 5 - 2, -h);
    ol2.lineTo(5 + 2, -h);
    ol2.curveTo(5 + 1, -h + 1, 5, -h + 2);
    ol2.lineTo(0, 0);
    ol2.endFill();
    var ol3 = tab.createEmptyMovieClip("over_lay_red", 4);
    ol3._visible = false;
    ol3.beginFill(0xff0000, 30);
    ol3.moveTo(0, 0);
    ol3.lineTo(w, 0);
    ol3.lineTo(w - 5, -h + 2);
    ol3.curveTo(w - 5 - 1, -h + 1, w - 5 - 2, -h);
    ol3.lineTo(5 + 2, -h);
    ol3.curveTo(5 + 1, -h + 1, 5, -h + 2);
    ol3.lineTo(0, 0);
    ol3.endFill();
    if (num == 0) {
        tab._x = 1;
    } else {
        tab._x = path["tab" + (num - 1)]._x + path["tab" + (num - 1)]._width - 6;
    }
    tab.onRollOver = function() {
        this.over_lay_black._alpha = 10;
    };
    tab.onRollOut = function() {
        this.over_lay_black._alpha = 0;
    };
    tab.onReleaseOutside = tab.onRollOut;
    tab.onRelease = function() {
        updatePrefMenu(num);
    };
}
//指定したタブをアクティブに

function updatePrefTab(num, active) {
    //var w = 99;
    var path = _root.pref_menu;
    var tab = path["tab" + num];
    //tab._visible = true;
    tab.over_lay_white._alpha = 50;
    tab.swapDepths(-Math.abs(tab.getDepth())); //ウィンドウより後ろへ
    if (active) {
        for (var i = 0; i < 5; i++) {
            var tab = path["tab" + i];
            if (i == num) { //アクティブにしたいタブ
                tab.over_lay_white._alpha = 0;
                tab.swapDepths(Math.abs(tab.getDepth())); //ウィンドウより前面へ
            } else {
                tab.over_lay_white._alpha = 50;
                tab.swapDepths(-Math.abs(tab.getDepth())); //ウィンドウより後ろへ
            }
        }
    }
}
createPrefTab("ブラウザ", 0, 0xf0f0f0);
createPrefTab("動画再生", 1, 0xf0f0f0);
createPrefTab("コメント", 2, 0xf0f0f0);
createPrefTab("操作", 3, 0xf0f0f0);
createPrefTab("キーボード", 4, 0xf0f0f0);
updatePrefMenu(0);
//★★★★★★★★★★★★★オートリンクのウィンドウ(23000) ★★★★★★★★★★★★★
//link_thumb.thumb0_0.thumbに自動リンクの1個目のサムネが読み込まれる
//link_thumb.thumb1_0.thumbにマイリスト1個目の1個目のサムネ
//link_thumb.tab0 自動リンクのタブ tab1 マイリスト1個目のタブ

function createLinkTab(name, num, color) {
    //リンクウィンドウにタブを作る
    //tab0自動リンク(深度10000) tab1～うｐ主のマイリスト(深度10001～)
    //非アクティブになると深度がマイナスになる
    //なんだけどマイナスの深度って消せなくなるんだっけ・・？
    //表示上は問題ないからいいか
    var h = 20;
    var w = 99;
    var depth = 10000 + num;
    var path = _root.link_thumb;
    var tab = path.createEmptyMovieClip("tab" + num, depth);
    tab._visible = false;
    tab.beginFill(color, 100);
    tab.lineStyle(1, 0xf0f0f0, 100);
    tab.moveTo(0, 0);
    tab.lineTo(w, 0);
    tab.lineStyle(1, 0x000000, 100);
    tab.lineTo(w - 5, -h + 2);
    tab.curveTo(w - 5 - 1, -h + 1, w - 5 - 2, -h);
    tab.lineTo(5 + 2, -h);
    tab.curveTo(5 + 1, -h + 1, 5, -h + 2);
    tab.lineTo(0, 0);
    tab.endFill();
    tab.createTextField("info", 1, 0, 0, 100, 20);
    tab.info.type = "dynamic";
    tab.info.border = false;
    tab.info.selectable = false;
    tab.info.background = false;
    tab.info.autoSize = false;
    tab.tabEnabled = false;
    tab.info.text = name;
    tab.info.setTextFormat(black12_fmt);
    tab.info._x = 0 + 5;
    tab.info._y = 0 - tab.info._height;
    var ol1 = tab.createEmptyMovieClip("over_lay_white", 2);
    ol1._alpha = 0;
    ol1.beginFill(0xffffff, 100);
    ol1.moveTo(0, 0);
    ol1.lineTo(w, 0);
    ol1.lineTo(w - 5, -h + 2);
    ol1.curveTo(w - 5 - 1, -h + 1, w - 5 - 2, -h);
    ol1.lineTo(5 + 2, -h);
    ol1.curveTo(5 + 1, -h + 1, 5, -h + 2);
    ol1.lineTo(0, 0);
    ol1.endFill();
    var ol2 = tab.createEmptyMovieClip("over_lay_black", 3);
    ol2._alpha = 0;
    ol2.beginFill(0x000000, 100);
    ol2.moveTo(0, 0);
    ol2.lineTo(w, 0);
    ol2.lineTo(w - 5, -h + 2);
    ol2.curveTo(w - 5 - 1, -h + 1, w - 5 - 2, -h);
    ol2.lineTo(5 + 2, -h);
    ol2.curveTo(5 + 1, -h + 1, 5, -h + 2);
    ol2.lineTo(0, 0);
    ol2.endFill();
    var ol3 = tab.createEmptyMovieClip("over_lay_red", 4);
    ol3._visible = false;
    ol3.beginFill(0xff0000, 30);
    ol3.moveTo(0, 0);
    ol3.lineTo(w, 0);
    ol3.lineTo(w - 5, -h + 2);
    ol3.curveTo(w - 5 - 1, -h + 1, w - 5 - 2, -h);
    ol3.lineTo(5 + 2, -h);
    ol3.curveTo(5 + 1, -h + 1, 5, -h + 2);
    ol3.lineTo(0, 0);
    ol3.endFill();
    tab.onRollOver = function() {
        this.over_lay_black._alpha = 10;
    };
    tab.onRollOut = function() {
        this.over_lay_black._alpha = 0;
    };
    tab.onReleaseOutside = tab.onRollOut;
    tab.onRelease = function() {
        links_num[0] = num;
        links_num[1] = 0;
        updateLinkTab(num, true);
        updateLinkThumb("update", num, 0);
        if (num == 0) {
            flashTab("stop");
        }
    };
}
createLinkTab("自動リンク", 0, 0xf0f0f0);
createLinkTab("マイリスト1", 1, 0xf0f0f0);
createLinkTab("マイリスト2", 2, 0xf0f0f0);
createLinkTab("マイリスト3", 3, 0xf0f0f0);
//タブの位置調整及び、指定したタブをアクティブに

function updateLinkTab(num, active) {
    var w = 99;
    var path = _root.link_thumb;
    var tab = path["tab" + num];
    tab._visible = true;
    tab.over_lay_white._alpha = 50;
    tab.swapDepths(-Math.abs(tab.getDepth())); //ウィンドウより後ろへ
    if (path.tab0._visible) {
        path.tab0._x = 0;
        path.tab1._x = w;
        path.tab2._x = w * 2;
        path.tab3._x = w * 3;
    } else {
        path.tab1._x = 0;
        path.tab2._x = w * 1;
        path.tab3._x = w * 2;
    }
    if (active) {
        for (var i = 0; i < 4; i++) {
            var tab = path["tab" + i];
            if (i == num) { //アクティブにしたいタブ
                tab.over_lay_white._alpha = 0;
                tab.swapDepths(Math.abs(tab.getDepth())); //ウィンドウより前面へ
            } else {
                tab.over_lay_white._alpha = 50;
                tab.swapDepths(-Math.abs(tab.getDepth())); //ウィンドウより後ろへ
            }
        }
    }
}
link_thumb.swapDepths(23000);
link_thumb._visible = false;
link_thumb.base.swapDepths(0);
//link_thumb.ameba.swapDepths(20);
//link_thumb.ameba._visible = false;
//link_thumb.ameba._x = 1;
//link_thumb.ameba._y = 22;
//link_thumb.photozou.swapDepths(21);
//link_thumb.photozou._visible = false;
//link_thumb.photozou._x = 1;
//link_thumb.photozou._y = 22;
link_thumb.base.onPress = function() {
    goTopDepth(link_thumb);
    var xm = link_thumb._xmouse;
    var ym = link_thumb._ymouse;
    if (ym > 0 && ym < 20) {
        if (xm > 0 && xm < 375) {
            link_thumb.startDrag();
        }
    }
};
link_thumb.base.onRelease = function() {
    link_thumb.stopDrag("");
    var xm = link_thumb._xmouse;
    var ym = link_thumb._ymouse;
    if (ym > 0 && ym < 20) {
        if (xm > 376 && xm < 398) {
            link_thumb._visible = false;
            //main_bar.link._visible = true;
            flashTab("stop");
        }
    } else if (ym > 20 && ym < 120) {
        if (xm > 0 && xm < 130) {
            var num = links[links_num[0]][links_num[1]].number;
            if (num != undefined) {
                var url;
                if (num.indexOf("http://") >= 0) {
                    url = num;
                } else {
                    url = "/watch/" + num;
                }
                if (auto_link_blank) {
                    getURL(url, '_blank');
                } else {
                    getURL(url);
                }
                if (nico.player.__get__state() == "playing") {
                    nico.player.pause();
                }
            }
        }
    } else if (ym > 120) {
        if (links[links_num[0]][links_num[1]].user_id != undefined) { //現在user_idは設定していない
            emphID(links[links_num[0]][links_num[1]].user_id);
            updateLogList("cand_ng_id");
        }
        if (links_num[0] > 0) {
            var url = mylists[links_num[0] - 1];
            if (auto_link_blank) {
                getURL(url, '_blank');
            } else {
                getURL(url);
            }
            if (nico.player.__get__state() == "playing") {
                nico.player.pause();
            }
        }
    }
};
link_thumb.createTextField("header_left", 2, 0, 0, 320, 17);
link_thumb.header_left.type = "dynamic";
link_thumb.header_left.selectable = false;
link_thumb.header_left.border = false;
link_thumb.header_left.background = false;
link_thumb.header_left.autoSize = false;
link_thumb.header_left.text = "";
link_thumb.header_left.setTextFormat(black12b_fmt);
link_thumb.createTextField("header_right", 3, 321, 0, 0, 0);
link_thumb.header_right.type = "dynamic";
link_thumb.header_right.selectable = false;
link_thumb.header_right.border = false;
link_thumb.header_right.background = false;
link_thumb.header_right.autoSize = true;
link_thumb.header_right.text = "";
link_thumb.header_right.setTextFormat(black12b_fmt);
link_thumb.createTextField("footer", 4, 0, 123, 398, 20);
link_thumb.footer.type = "dynamic";
link_thumb.footer.selectable = false;
link_thumb.footer.border = false;
link_thumb.footer.background = false;
link_thumb.footer.autoSize = false;
link_thumb.footer.wordWrap = false;
link_thumb.footer.text = "";
link_thumb.footer.setTextFormat(black11_fmt);
link_thumb.createTextField("title", 5, 131, 22, 398 - 131 - 2, 17 + 3);
link_thumb.title.type = "dynamic";
link_thumb.title.selectable = false;
link_thumb.title.border = false;
link_thumb.title.background = true;
link_thumb.title.backgroundColor = 0xffffe0;
link_thumb.title.autoSize = false;
link_thumb.title.wordWrap = true;
link_thumb.title.text = "";
link_thumb.title.setTextFormat(black12b_fmt);
link_thumb.createTextField("info", 6, 131, 42, 398 - 131 - 2, 79);
link_thumb.info.type = "dynamic";
link_thumb.info.selectable = false;
link_thumb.info.border = false;
link_thumb.info.background = false;
link_thumb.info.autoSize = false;
link_thumb.info.wordWrap = true;
link_thumb.info.text = "";
link_thumb.info.setTextFormat(black12_fmt);
link_thumb.createTextField("thumb_status", 7, 0, 21, 1, 1);
link_thumb.thumb_status.type = "dynamic";
link_thumb.thumb_status.selectable = false;
link_thumb.thumb_status.border = false;
link_thumb.thumb_status.background = false;
link_thumb.thumb_status.autoSize = true;
link_thumb.thumb_status.wordWrap = false;
createSquareBtn(link_thumb, "open_blur", "B", white12b_fmt, 9999, 120, 112, 20, 20, 0x303030);
link_thumb.open_blur.onRelease = function() {
    var num = links[links_num[0]][links_num[1]].number;
    if (num != undefined) {
        var url;
        if (num.indexOf("http://") >= 0) {
            url = num;
        } else {
            url = "/watch/" + num;
        }
        if (use_javascript) {
            doJavaScript("window.open('" + url + "', '_blank').blur();");
        } else {
            getURL(url, "_blank");
        }
    }
};
createSquareBtn(link_thumb, "load", "情報を読み込み", white12b_fmt, 10, 340, 105, 100, 20, 0x303030);
link_thumb.load.onRelease = function() {
    if (links_num[0] == 0) { //自動リンクの場合
        this._visible = false;
        var tThumb = links[links_num[0]][links_num[1]];
        tThumb.title = "";
        link_thumb.title.text = tThumb.title;
        tThumb.info = "読み込み中";
        link_thumb.info.text = tThumb.info;
        link_thumb.info.setTextFormat(black12_fmt);
        var link_info = new LoadVars();
        link_info.onData = function(src) {
            var info = "",
                title = "";
            if (src != undefined) {
                var start_keys = new Array("<title>");
                var end_key = "</title>";
                title = searchHTML(src, start_keys, end_key);
                if (title != null) {
                    title = replaceSentence(title, "&amp;", "&"); //とりあえずありがちなのだけ変換
                    title = replaceSentence(title, "&#039;", "'"); //とりあえずありがちなのだけ変換
                } else {
                    title = "HTML解析失敗";
                }
                var start_keys = new Array("<description>");
                var end_key = "</description>";
                info = searchHTML(src, start_keys, end_key);
                if (info != null) {
                    info = replaceSentence(info, ["\n", "\r"], ""); //改行削除
                    info = removeHTMLTag(info); //他のhtmlタグ削除
                    info = replaceSentence(info, [" ", "　"], ""); //スペース削除
                    info = replaceSentence(info, "&amp;", "&"); //とりあえずありがちなのだけ変換
                    info = replaceSentence(info, "&#039;", "'"); //とりあえずありがちなのだけ変換
                } else {
                    info = "HTML解析失敗\n" + src;
                }
            } else {
                title = "読み込み失敗";
                info = undefined;
            }
            tThumb.title = title;
            tThumb.info = info;
            updateLinkThumb("update", links_num[0], links_num[1]);
        };
        link_info.load("/api/getthumbinfo/" + tThumb.number);
    } else if (links_num[0] > 0) { //マイリストの場合
        //↓バックアップ マイリストは読み込みが終わったあとにサムネを取得開始するので
        //↓読み込み中にタブ切り替えとかされると、どのリストのサムネか分からなくなってしまうため
        var backup = links_num.slice(0);
        var tmp_num = backup[0];
        this._visible = false;
        var tThumb = links[tmp_num];
        tThumb.title = "";
        link_thumb.title.text = tThumb.title;
        tThumb.info = "読み込み中";
        link_thumb.info.text = tThumb.info;
        link_thumb.info.setTextFormat(black12_fmt);
        var link_info = new LoadVars();
        link_info.onData = function(src) {
            var info = "",
                title = "";
            if (src != undefined) {
                var start_keys = new Array("<h1", ">");
                var end_key = "</h1>";
                title = searchHTML(src, start_keys, end_key);
                if (title == null) {
                    title = "HTML解析失敗";
                }
                var start_keys = new Array("</h1>", "<p class=\"TXT12\">");
                var end_key = "</p>";
                info = searchHTML(src, start_keys, end_key);
                if (info == null) {
                    info = "HTML解析失敗";
                }
                var start_keys = new Array("id=\"mylists\"", ">");
                var end_key = "<script type=\"text/javascript\">";
                src = searchHTML(src, start_keys, end_key);
                if (src == null) {
                    info = "HTML解析失敗";
                }
                start_keys = new Array("<h3>", "<a ", ">");
                end_key = "</a>";
                var title_ary = searchHTMLs(src, start_keys, end_key);
                start_keys = new Array("</h3>", "<p ", ">");
                end_key = "</p>";
                var info_ary = searchHTMLs(src, start_keys, end_key);
                start_keys = new Array("<a href=\"watch/");
                end_key = "\"";
                var number_ary = searchHTMLs(src, start_keys, end_key);
                start_keys = new Array("<input id=\"lazyimage", "value=\"");
                end_key = "\"";
                var thumb_ary = searchHTMLs(src, start_keys, end_key);
                if (title_ary.length > 0 && title_ary.length == info_ary.length && title_ary.length == number_ary.length && title_ary.length == thumb_ary.length) {
                    for (var i = 0; i < title_ary.length; i++) {
                        tThumb[i] = new Array();
                        title_ary[i] = replaceSentence(title_ary[i], "&amp;", "&"); //とりあえずありがちなの
                        title_ary[i] = replaceSentence(title_ary[i], "&#039;", "'"); //とりあえずありがちなの
                        tThumb[i].title = title_ary[i];
                        info_ary[i] = replaceSentence(info_ary[i], ["\n", "\r"], ""); //改行削除
                        info_ary[i] = removeHTMLTag(info_ary[i]); //他のhtmlタグ削除
                        info_ary[i] = replaceSentence(info_ary[i], "&amp;", "&"); //とりあえずありがちなのだけ
                        info_ary[i] = replaceSentence(info_ary[i], "&#039;", "'"); //とりあえずありがちなのだけ
                        tThumb[i].info = info_ary[i];
                        tThumb[i].number = number_ary[i];
                        tThumb[i].thumb_status = "順番待ち";
                        tThumb[i].message = info;
                    }
                    //サムネ読み込み開始
                    for (var i = 0; i < thumb_ary.length; i++) {
                        var thumb_window = link_thumb.createEmptyMovieClip("thumb" + tmp_num + "_" + i, 1000 + 1000 * tmp_num + i);
                        thumb_window._visible = false;
                        thumb_window._x = 1;
                        thumb_window._y = 22;
                        thumb_window._width = 130;
                        thumb_window._height = 100;
                        buffer_ary.push({
                            list_num: tmp_num,
                            thumb_num: i,
                            url: thumb_ary[i],
                            timeout1: 0,
                            timeout2: 0,
                            retry: 0,
                            status: "ready"
                        });
                    }
                } else {
                    title = "HTML解析失敗" + title_ary.length + "," + info_ary.length + "," + number_ary.length + "," + thumb_ary.length;
                    info = "HTML解析失敗\n" + src;
                }
            } else {
                title = "読み込み失敗";
                info = undefined;
            }
            tThumb.title = title;
            tThumb.info = info;
            updateLinkThumb("update", links_num[0], links_num[1]);
        };
        link_info.load(mylists[tmp_num - 1]);
    }
};
//add 自動リンク生成
//next 次のサムネに表示切替
//before 前のサムネに表示切替
//update l_num番のリストのt_num番のサムネに切り替え

function updateLinkThumb(mode, l_num, t_num) {
    if (mode == "add") {
        var num = links[0].length - 1; //自動リンクの一番最後 すなわちaddするであろうリンク
        goTopDepth(link_thumb);
        if (link_thumb._visible && links_num[0] > 0) { //マイリストみてる時
            updateLinkTab(0, false);
            flashTab("start");
        } else {
            if (auto_display_auto_link && !nico.isLargeScreen && !nico.hirobaMode) {
                //タグ及びマイリストからリンクを検索
                if (use_javascript && check_html_status == "waiting") {
                    check_html_status = "loading";
                    checkHTML();
                }
                link_thumb._visible = true;
            }
            //if(!(link_thumb._visible|main_bar.link._visible)){main_bar.link._visible = true;}
            links_num = [0, num];
            updateLinkTab(0, true);
            //main_bar.link._visible = false;
        }
        var first_name = links[0][num].number.substr(0, 2); //sm am fzとか
        var last_name = links[0][num].number.substr(2); //数字
        var thumb_window = link_thumb.createEmptyMovieClip("thumb0_" + num, 100 + num);
        thumb_window._visible = false;
        thumb_window._x = 1;
        thumb_window._y = 22;
        thumb_window._width = 100;
        thumb_window._height = 130;
        if (first_name == "sm" || first_name == "ca") {
            var url = "http://tn-skr.smilevideo.jp/smile?i=" + last_name;
            buffer_ary.unshift({
                list_num: 0,
                thumb_num: num,
                url: url,
                timeout1: 0,
                timeout2: 0,
                retry: 0,
                status: "ready"
            });
            //      }else if(first_name == "am" || first_name == "fz"){
            //          thumb_window.createEmptyMovieClip("thumb",1);
        }
        updateLinkThumb("update", links_num[0], links_num[1]);
        return;
    }
    //ここからサムネの表示反映
    var bNum = links_num.slice(0);
    if (mode == "next") {
        links_num[1]++;
    } else if (mode == "before") {
        links_num[1]--;
    } else if (mode == "update") {
        links_num[0] = l_num;
        links_num[1] = t_num;
    }
    if (link_thumb["thumb" + links_num[0] + "_" + links_num[1]] == undefined) {
        links_num = bNum.slice(0);
    }
    var first_name = links[links_num[0]][links_num[1]].number.substr(0, 2); //sm am fzとか
    for (var i = 0; i < links.length; i++) {
        for (var j = 0; j < links[i].length; j++) {
            var thumb_window = link_thumb["thumb" + i + "_" + j];
            if (i == links_num[0] && j == links_num[1]) {
                if (first_name == "sm" || first_name == "ca") {
                    thumb_window._visible = true;
                    thumb_window._width = 130;
                    thumb_window._height = 100;
                }
                //}else if(first_name == "am"){
                //  link_thumb.ameba._visible = true;
                //}else if(first_name == "fz"){
                //  link_thumb.photozou._visible = true;
                //}
            } else {
                thumb_window._visible = false;
                //if(first_name != "am"){
                //  link_thumb.ameba._visible = false;
                //}
                //if(first_name != "fz"){
                //  link_thumb.photozou._visible = false;
                //}
            }
        }
    }
    //ここからtextfieldの表示反映
    if (links[links_num[0]].title != undefined) {
        link_thumb.header_left.text = links[links_num[0]].title;
    } else if (links_num[0] == 0) {
        link_thumb.header_left.text = links[links_num[0]][links_num[1]].number;
    } else {
        link_thumb.header_left.text = "";
    }
    link_thumb.header_left.setTextFormat(black12b_fmt);
    if (links[links_num[0]].length > 0) {
        link_thumb.header_right.text = " (" + (links_num[1] + 1) + "/" + links[links_num[0]].length + ")";
    } else {
        link_thumb.header_right.text = "";
    }
    link_thumb.header_right.setTextFormat(black12b_fmt);
    if (links[links_num[0]][links_num[1]].message != undefined) {
        link_thumb.footer.text = links[links_num[0]][links_num[1]].message;
    } else {
        link_thumb.footer.text = "";
    }
    link_thumb.footer.setTextFormat(black10_fmt);
    link_thumb.footer.hscroll = 0;
    if (links[links_num[0]][links_num[1]].title != undefined) {
        link_thumb.title.text = links[links_num[0]][links_num[1]].title;
    } else {
        link_thumb.title.text = "";
    }
    link_thumb.title.setTextFormat(black12b_fmt);
    if (links[links_num[0]][links_num[1]].info != undefined) {
        link_thumb.info.text = links[links_num[0]][links_num[1]].info;
    } else {
        link_thumb.info.text = "";
    }
    link_thumb.info.setTextFormat(black12_fmt);
    link_thumb.info.scroll = 0;
    adjustTitleHeight();
    if (links[links_num[0]][links_num[1]].thumb_status != undefined) {
        link_thumb.thumb_status.text = links[links_num[0]][links_num[1]].thumb_status;
    } else {
        link_thumb.thumb_status.text = "";
    }
    link_thumb.thumb_status.setTextFormat(black12_fmt);
    link_thumb.load._visible = false;
    if (links_num[0] == 0 && links[links_num[0]][links_num[1]].info == undefined) {
        if (links[links_num[0]][links_num[1]].number.indexOf("http://") < 0) {
            link_thumb.load._visible = true;
        }
    } else if (links_num[0] > 0 && links[links_num[0]].info == undefined) {
        link_thumb.load.onRelease();
    }
}
//link_thumb.titleの高さを文字の長さに応じて1段にしたり2段にしたり調整する

function adjustTitleHeight() {
    link_thumb.title.wordWrap = false;
    if (link_thumb.title.textWidth > 260) {
        link_thumb.title.wordWrap = true;
        link_thumb.title._height = 17 + 3 + 17;
        link_thumb.info._y = 42 + 17;
        link_thumb.info._height = 79 - 17;
    } else {
        link_thumb.title.wordWrap = false;
        link_thumb.title._height = 17 + 3;
        link_thumb.info._y = 42;
        link_thumb.info._height = 79;
    }
}
//配列start_keysでhtmlを頭からindexOfで検索していって開始地点を探す
//探しだしたら、そこからend_keyまでを抜き出す

function searchHTML(html, start_keys, end_key) {
    for (var i = 0; i < start_keys.length; i++) {
        if (html.indexOf(start_keys[i]) < 0) {
            return null;
        } else {
            html = html.substr(html.indexOf(start_keys[i]) + start_keys[i].length);
        }
    }
    if (html.indexOf(end_key) < 0) {
        return null;
    } else {
        html = html.substring(0, html.indexOf(end_key));
    }
    return html;
}
//searchHTMLの複数版　探したい内容が複数ある場合
//返答は配列で、1個もみつからないと空の配列

function searchHTMLs(html, start_keys, end_key) {
    var tmp = html;
    var count = 1;
    var result_ary = new Array();
    while (count <= 500) {
        tmp = html;
        for (var i = 0; i < start_keys.length; i++) {
            if (tmp.indexOf(start_keys[i]) < 0) {
                return result_ary;
            } else {
                tmp = tmp.substr(tmp.indexOf(start_keys[i]) + start_keys[i].length);
            }
        }
        html = tmp;
        if (tmp.indexOf(end_key) < 0) {
            return result_ary;
        } else {
            tmp = tmp.substring(0, tmp.indexOf(end_key));
            result_ary.push(tmp);
        }
        count++;
    }
    return result_ary;
}
//htmlのタグっぽいのを全部取り除く
//mingだとtextFieldのhtmlタグがうまくいかない

function removeHTMLTag(html) {
    while (html.length > 0) {
        var start_tag_index = html.indexOf("<");
        if (start_tag_index >= 0) {
            var end_tag_index = html.indexOf(">", start_tag_index);
            if (end_tag_index >= 0) {
                html = html.substring(0, start_tag_index) + html.substr(end_tag_index + 1);
            } else {
                break;
            }
        } else {
            break;
        }
    }
    return html;
}
/* 使い方
 _time("name");
計測するスクリプト
_timeEnd("name")
*/
function _time(data) {
    flash.external.ExternalInterface.call("console.time", data);
}

function _timeEnd(data) {
    flash.external.ExternalInterface.call("console.timeEnd", data);
}
function _trace(data) {
    flash.external.ExternalInterface.call("console.log", '(' + typeof(data) + ') : ' + data);
}

function _dump(data, indent) {
    if (!indent) {
        indent = 0;
    }
    if (indent == 0) {
        trace('------------------------- ↓');
    }
    var space = '';
    var key = 0;
    for (key in data) {
        var value = data[key];
        if (typeof(value) == "object") {
            space = '';
            for (var i = 0; i < indent * 8; i++) {
                space += ' ';
            }
            flash.external.ExternalInterface.call("console.log", space + key + ' : (' + typeof(value) + ') : ' + value);
            indent++;
            _dump(value, indent);
            indent--;
        } else {
            space = '';
            for (var i = 0; i < indent * 8; i++) {
                space += ' ';
            }
            flash.external.ExternalInterface.call("console.log", space + key + ' : (' + typeof(value) + ') : ' + value);
        }
    }
    if (typeof(data) == 'string' || typeof(data) == 'number' || typeof(data) == 'boolean' || typeof(data) == 'undefined' || typeof(data) == 'null') {
        trace('名無し' + ' : (' + typeof(data) + ') : ' + data);
    }
    if (indent == 0) {
        trace('------------------------- ↑' + "\n");
    }
}
//★★★★★★★★★★★★★テスト用ボタン 10000～★★★★★★★★★★★★★
if (test_mode) {
    createSquareBtn(main_bar, "test", "テスト", white12b_fmt, 10000, 900, 3, 60, 20, 0x303030);
    main_bar.test._x = 515;
    main_bar.test._y = 11;
    main_bar.test.onRelease = function() {
        //テストしたいScript テストボタン
        //_dump(nico.tabmenu);
        //flash.external.ExternalInterface.call("console.log", nico.tabmenu.enable);
        _trace(nico.GETFLV_URL);
        /*
    //  nico.connectBoard(true);
    trace("atData "+ video_postedAt);
    trace("data: "+nico.wayback_date+" hour: "+nico.tabmenu.wayback_menu.wayback_hour.value+" min: "+nico.tabmenu.wayback_menu.wayback_min.value);
    trace(nico.tabmenu.wayback_menu.wayback_date.selectableRange.rangeStart);
    nico.tabmenu.wayback_menu.wayback_hour.value = nico.ThreadCreateDate.getHours();
    nico.tabmenu.wayback_menu.wayback_min.value  = nico.ThreadCreateDate.getMinutes();
    nico.tabmenu.wayback_menu.wayback_date.selectedDate = nico.tabmenu.wayback_menu.wayback_date.selectableRange.rangeStart;
    nico.tabmenu.wayback_menu.wayback_date.selectedDate.setTime(nico.tabmenu.wayback_menu.wayback_date.selectedDate.getTime() + (7 * 24 * 3600 * 1000));
    //nico.tabmenu.wayback_menu.wayback_date.selectableRange = {'rangeStart': new Date(nico.ThreadCreateDate.getFullYear(), nico.ThreadCreateDate.getMonth(), nico.ThreadCreateDate.getDate()), 'rangeEnd': nico.StartDate};
    //nico.wayback_date = video_postedAt;
*/
    };
}
//★★★★★★★★★★★★★ログリスト周辺 20000★★★★★★★★★★★★★
loglist_menu.swapDepths(20000);
loglist_menu.tab._visible = false;
//loglist_menu.tab.onPress = function(){};
//NGID追加ボタン リストのあたりに表示する1
createSquareBtn(loglist_menu, "add_id", "NGIDに追加", white12b_fmt, 1, 315, 2, 90, 23, 0x303030);
loglist_menu.add_id.onRelease = function() {
    this._visible = false;
    cand_ng_id = deleteRepField(cand_ng_id, "user_id", false);
    updateFilter("add_id");
};
loglist_menu.add_id._visible = false;
//リストをノーマルに戻す リストのあたりに表示する2
createSquareBtn(loglist_menu, "normal_list", "一覧に戻る", white12b_fmt, 2, 198, 2, 90, 23, 0x500000);
loglist_menu.normal_list.onRelease = function() {
    updateLogList("normal");
};
loglist_menu.normal_list._visible = false;
//強調表示ボタン リストのあたりに表示する3
createSquareBtn(loglist_menu, "cand_ng_id_list", "IDで抽出", white12b_fmt, 3, 198, 2, 90, 23, 0x303050);
loglist_menu.cand_ng_id_list.onRelease = function() {
    updateLogList("cand_ng_id");
};
loglist_menu.cand_ng_id_list._visible = false;
function quickNGWord(NGWord) {
    ML = fwMessages.length;
    i = 0;
    ngCount = 0;
    NGWord = toHankakuNum(NGWord).toLowerCase();
    while (i < ML) { //新着メッセのカスタムフィルターフラグ立て
        var mes = nico.Messages[i];
        // 元メッセージを半角へ
        if (toHankakuNum(mes._message).toLowerCase().indexOf(NGWord) >= 0) {
            fwHideMessage(mes);
            ngCount++;
        }
        i++;
    }
    showInfoOnMainBar(ngCount + " 件削除しました");
}

function toHankakuNum(motoText) {
    var hankaku = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789.,−+/?@';
    var zenkaku = 'ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺａｂｃｄｅｆｇｈｉｊｋｌｍｎｏｐｑｒｓｔｕｖｗｘｙｚ０１２３４５６７８９．，−＋／？＠';
    var str = "",
        c, n;
    for (var i = 0; i < motoText.length; i++) {
        c = motoText.charAt(i);
        n = zenkaku.indexOf(c, 0);
        if (n >= 0) c = hankaku.charAt(n);
        str += c;
    }
    return str;
}

function updateFilter(mode, num) {
    var i, ML;
    var update_info = false;
    if (mode == "add_id") {
        //NGID追加 フラグ立ててメッセージ消去 ng_idsに追加 ng_idsの重複チェック&削除
        //事前にcand_ng_id内の重複削除しておいたほうが早くなる
        update_info = true;
        i = 0;
        ML = ngid_filter_message_count;
        var myDate = new Date();
        var addDate = myDate.getTime();
        var addID, addMessage;
        var checked_ary = new Array();
        //      var mes_ary = fwMessages.sortOn("user_id",16|8);//こうしたいがなぜかダメだった
        var mes_ary = fwMessages.slice(i, ML); //コピー
        mes_ary.sortOn("user_id", 16); //user_id小さい順
        for (var j = 0; j < cand_ng_id.length; j++) {
            addID = cand_ng_id[j].user_id;
            addMessage = cand_ng_id[j].message;
            var result_nums = binarySearchS(mes_ary, "user_id", addID);
            if (result_nums.length > 0) {
                for (var k = 0; k < result_nums.length; k++) {
                    var no = mes_ary[result_nums[k]].no;
                    NGIDFlagOn(no);
                    if (filter5_on) { //NGIDフィルターオンなら消す
                        fwHideMessage(nico.Messages[no]);
                    }
                    if (k == result_nums.length - 1) { //最後にヒットしたコメント
                        addMessage = nico.Messages[no]._message;
                    }
                }
            }
            ng_ids.push({
                user_id: addID,
                date: addDate,
                message: addMessage
            });
        }
        updateLogList("clear");
        cand_ng_id = new Array(); //消去
        ng_ids.sortOn("user_id", 16); //user_idの数値の小さい順
        ng_ids = deleteRepField(ng_ids, "user_id", true);
        ng_ids_so.data.ids = ng_ids;
        ng_ids_so.flush();
        showInfoOnMainBar("重複チェック＆NGID追加完了");
        if (always_open_ngid_menu || ngid_menu._visible) {
            updateNGIDMenu("ng_ids");
        }
        clearEmphMes("both");
        showInfoOnBtn("filter5", ngid_filter_count);
    } else if (mode == "add_filter") { //フィルターオン
        update_info = true;
        _root["filter" + num + "_on"] = true;
        var filter_flag;
        var Mes = nico.Messages;
        i = 0;
        if (num < 5) {
            ML = custom_filter_message_count;
            filter_flag = _root["filter" + num + "_flag"];
            showInfoOnMainBar("フィルター" + num + "を適用しました");
        } else if (num == 5) {
            ML = ngid_filter_message_count;
            filter_flag = ngid_filter_flag;
            showInfoOnMainBar("NGIDを適用しました");
        }
        clearEmphMes("MessageSlots");
        while (i < ML) {
            if (filter_flag[i]) {
                fwHideMessage(Mes[i]);
            }
            Mes[i]._mine = false; //全部枠はずす
            i++;
        }
        if (list_mode != "normal") {
            updateLogList("clear");
        }
    } else if (mode == "check") { //新着メッセチェックしてフラグを立てる
        //まずNGIDから
        ML = fwMessages.length;
        i = ngid_filter_message_count;
        //var resno_ary = new Array();//ログリストから取り除くコメントのresnoを入れておく
        if (i < ML) {
            update_info = true;
            var ngid_write_flag = false;
            var myDate = new Date();
            var addDate = myDate.getTime();
            var new_mes_ary = fwMessages.slice(i);
            var search_mode = checkSearchMode(new_mes_ary.length, ng_ids.length); //どれをソートするか決定
            if (search_mode == "new_mes_search") {
                new_mes_ary.sortOn("user_id", 16); //user_idフィールドの数値の小さい順に並べる
                var sorted_result = new Array(); //消去するコメント番号をソートしつつ格納していく
                for (var j = 0; j < ng_ids.length; j++) {
                    var result_nums = binarySearchS(new_mes_ary, "user_id", ng_ids[j].user_id);
                    if (result_nums.length > 0) { //IDヒットしたメッセージの配列が返ってきた
                        ngid_write_flag = true;
                        for (var k = 0; k < result_nums.length; k++) {
                            var no = new_mes_ary[result_nums[k]].no;
                            NGIDFlagOn(no);
                            if (k == result_nums.length - 1) { //最後にヒットしたメッセージと時間を格納
                                ng_ids[j].date = addDate;
                                ng_ids[j].message = nico.Messages[no]._message;
                            }
                            //二分探索で挿入位置を決定
                            var l = 0;
                            var r = sorted_result.length;
                            while (l < r) {
                                var m = (((l + r) / 2) | 0);
                                if (sorted_result[m] > no) {
                                    r = m;
                                } else {
                                    l = m + 1;
                                }
                            }
                            //for(var l=0; l<sorted_result.length; l++){
                            //  if(sorted_result[l]>=no){break;}
                            //}
                            sorted_result.splice(l, 0, no);
                        }
                    }
                }
                //まとめて消去
                for (var j = 0; j < sorted_result.length; j++) {
                    var no = sorted_result[j];
                    //resno_ary.push(fwMessages[no]._no);
                    fwHideMessage(nico.Messages[no]);
                }
            } else if (search_mode == "ng_search") {
                //              ng_ids.sortOn("user_id",16);//user_idフィールドの数値の小さい順に並べる
                for (var j = 0; j < new_mes_ary.length; j++) {
                    var result_num = binarySearch(ng_ids, "user_id", new_mes_ary[j].user_id);
                    if (result_num >= 0) { //new_mes_ary[j]がNGID対象だったので
                        ngid_write_flag = true;
                        var no = new_mes_ary[j].no;
                        //resno_ary.push(fwMessages[no]._no);
                        NGIDFlagOn(no);
                        fwHideMessage(nico.Messages[no]);
                        ng_ids[result_num].date = addDate;
                        ng_ids[result_num].message = new_mes_ary[j]._message;
                    }
                }
            } else if (search_mode == "no_search") { //特に大きくないので総当り
                while (i < ML) { //新着メッセのNGIDチェック
                    var mes = nico.Messages[i];
                    for (var j = 0; j < ng_ids.length; j++) {
                        if (fwMessages[i].user_id == ng_ids[j].user_id) {
                            ngid_write_flag = true;
                            var no = fwMessages[i].no;
                            //resno_ary.push(fwMessages[no]._no);
                            NGIDFlagOn(i);
                            fwHideMessage(mes);
                            ng_ids[j].date = addDate;
                            ng_ids[j].message = mes._message;
                            break;
                        }
                    }
                    i++;
                }
            }
            //新着コメントをログリストに追加
            nico.LogList.dataProvider = nico.LogListDP;
            for (var i = ngid_filter_message_count, j = nico.LogList.length; i < ML; i++) {
                var mes = fwMessages[i];
                var message = mes._message;
                if (add_id) { //add_idならAddChatLogする前にメッセージにID付与
                    message = "[" + mes.user_id.substr(0, id_length) + "] " + message;
                    if (mes.premium) {
                        message = "P" + message;
                    }
                }
                if (!ngid_filter_flag[i]) {
                    nico.AddChatLog(nico.LogListDP, j, 0, mes._no, mes.user_id, mes._vpos, message, mes.mail, "", mes.date, 0, mes._scriptError);
                    //非表示チェックボックスにチェックを入れる
                    if (e) {
                        if (mes.deleted) {
                            nico.LogList.editField(j, 'deleted', true);
                        }
                    }
                    j++;
                }
            }
            //ソートする (nico.isPlayScroll時はnico.writeLogList内で再生時間でソートされる)
            if (!nico.isPlayScroll) {
                var options;
                if (nico.LogList.sortDirection == 'DESC') {
                    options = Array.DESCENDING;
                }
                if (loglist_sorted_column == 'resno' || loglist_sorted_column == 'when') {
                    options = options | Array.NUMERIC;
                }
                nico.LogList.dataProvider.sortOn(loglist_sorted_column, options);
            }
            nico.writeLogList(nico.LogList, nico.LogListDP, nico.LogList_Wb, nico.deleteList);
            nico.NGMessages();
            showInfoOnBtn("filter5", ngid_filter_count);
            ngid_filter_message_count = ML;
            if (ngid_write_flag) {
                ng_ids_so.data.ids = ng_ids;
                ng_ids_so.flush();
                if (always_open_ngid_menu || ngid_menu._visible) {
                    updateNGIDMenu("ng_ids");
                }
            }
        }
        //次にカスタムフィルター
        i = custom_filter_message_count;
        if (i < ML) {
            update_info = true;
            while (i < ML) { //新着メッセのカスタムフィルターフラグ立て
                var mes = nico.Messages[i];
                for (var j = 1; j <= 4; j++) {
                    var hideFlag = true;
                    if (filter_command_ary[j] == undefined) {
                        hideFlag = false;
                    }
                    if (hideFlag && filter_command_ary[j].place != undefined) {
                        hideFlag = false;
                        for (var k = 0; k < filter_command_ary[j].place.length; k++) {
                            if (filter_command_ary[j].place[k] == "all" && mes._place != undefined) {
                                hideFlag = true;
                                break;
                            } else if (filter_command_ary[j].place[k] == mes._place) {
                                hideFlag = true;
                                break;
                            } else if (filter_command_ary[j].place[k] == "normal" && mes._place == undefined) {
                                hideFlag = true;
                                break;
                            }
                        }
                    }
                    if (hideFlag && filter_command_ary[j].size != undefined) {
                        hideFlag = false;
                        for (var k = 0; k < filter_command_ary[j].size.length; k++) {
                            if (filter_command_ary[j].size[k] == "all" && mes._font != undefined) {
                                hideFlag = true;
                                break;
                            } else if (filter_command_ary[j].size[k] == mes._font.size) {
                                hideFlag = true;
                                break;
                            } else if (filter_command_ary[j].size[k] == "normal" && mes._font == undefined) {
                                hideFlag = true;
                                break;
                            }
                        }
                    }
                    if (hideFlag && filter_command_ary[j].color != undefined) {
                        hideFlag = false;
                        for (var k = 0; k < filter_command_ary[j].color.length; k++) {
                            if (filter_command_ary[j].color[k] == "all" && mes._color != undefined) {
                                hideFlag = true;
                                break;
                            } else if (filter_command_ary[j].color[k] == mes._color) {
                                hideFlag = true;
                                break;
                            } else if (filter_command_ary[j].color[k] == "normal" && mes._color == undefined) {
                                hideFlag = true;
                                break;
                            }
                        }
                    }
                    if (hideFlag && filter_command_ary[j].vpos != undefined) {
                        hideFlag = false;
                        for (var k = 0; k < filter_command_ary[j].vpos.length; k++) {
                            if (filter_command_ary[j].vpos[k] - 2 <= mes._vpos && filter_command_ary[j].vpos[k] + 2 >= mes._vpos) {
                                hideFlag = true;
                                break;
                            }
                        }
                    }
                    if (hideFlag && filter_command_ary[j].mes != undefined) {
                        hideFlag = false;
                        for (var k = 0; k < filter_command_ary[j].mes.length; k++) {
                            if (mes._message.indexOf(filter_command_ary[j].mes[k]) >= 0) {
                                hideFlag = true;
                                break;
                            }
                        }
                    }
                    if (hideFlag) { //フラグオン
                        _root["filter" + j + "_flag"][i] = true;
                        _root["filter" + j + "_count"]++;
                    }
                }
                if ((filter1_flag[i] && filter1_on) || (filter2_flag[i] && filter2_on) || (filter3_flag[i] && filter3_on) || (filter4_flag[i] && filter4_on)) {
                    //resno_ary.push(fwMessages[fwMessages[i].no]._no);
                    fwHideMessage(mes);
                }
                i++;
            }
            showInfoOnBtn("filter1", filter1_count);
            showInfoOnBtn("filter2", filter2_count);
            showInfoOnBtn("filter3", filter3_count);
            showInfoOnBtn("filter4", filter4_count);
            custom_filter_message_count = ML;
        }
        /*
        if(resno_ary.length > 0){
            //ログリストからNGIDを取り除く
            for(var j=nico.LogList.length-1; j>=0; j--){
                var item = nico.LogList.getItemAt(j);
                var high = resno_ary.length - 1;
                var low = 0;
                var mid = Math.floor((low+high)/2);
                var result_num = -1;
                while(high >= low){
                    if(item.resno == resno_ary[mid]){
                        result_num = mid;
                        break;
                    }
                    if(item.resno < resno_ary[mid]){
                        high = mid - 1;
                    }else{
                        low = mid + 1;
                    }
                    mid=Math.floor((low+high)/2);
                }
                if(result_num >= 0){//nico.LogListのj番目のアイテムがNGID対象だったので
                    //nico.LogList.removeItemAt(j);
                    resno_ary.splice(result_num, 1);
                }
            }
        }
        */
    } else if (mode == "delete_id") {
        update_info = true;
        i = 0;
        ML = fwMessages.length;
        ng_ids.sortOn("date", 16 | 2); //dateフィールドの数値の大きい順に並べる
        var id = ng_ids.splice(num, 1)[0].user_id;
        ng_ids.sortOn("user_id", 16); //user_idの数値の小さい順に戻しておく
        ng_ids_so.data.ids = ng_ids;
        ng_ids_so.flush();
        cand_ng_id = new Array();
        while (i < ML) {
            var mes = nico.Messages[i];
            if (mes._user == id && mes._deleted == 1 && (!filter1_flag[i] || !filter1_on) && (!filter2_flag[i] || !filter2_on) && (!filter3_flag[i] || !filter3_on) && (!filter4_flag[i] || !filter4_on)) {
                cand_ng_id.push({
                    user_id: fwMessages[i].user_id,
                    date: 0,
                    message: fwMessages[i]._message,
                    vpos: fwMessages[i]._vpos,
                    no: fwMessages[i].no,
                    msgs: 'current'
                });
                mes._mine = true;
                mes._deleted = 0;
                ngid_filter_flag[i] = false;
                ngid_filter_count--;
                filter_count--;
                var vpos = nico.player.__get__playheadTime();
                if (vpos >= mes._vstart && vpos <= mes._vend) {
                    nico.ShowMessage(mes, nico.Messages);
                }
            } else if (mes._mine == true) {
                mes._mine = false;
                var vpos = nico.player.__get__playheadTime();
                if (vpos >= mes._vstart && vpos <= mes._vend) {
                    nico.HideMessage(mes, nico.MessageSlots);
                    nico.ShowMessage(mes, nico.Messages);
                }
            }
            i++;
        }
        updateNGIDMenu("ng_ids");
        if (cand_ng_id.length > 0) {
            updateLogList("cand_ng_id");
        } else {
            updateLogList("clear");
        }
        showInfoOnMainBar("[" + id.substr(0, id_length) + "] を削除しました(" + cand_ng_id.length + "件表示)");
        showInfoOnBtn("filter5", ngid_filter_count);
    } else if (mode == "clear_id") {
        update_info = true;
        i = 0;
        ML = fwMessages.length;
        ngid_filter_count = 0;
        ng_ids = new Array();
        ngid_filter_flag = new Array();
        ng_ids_so.data.ids = new Array();
        ng_ids_so.flush();
        cand_ng_id = new Array();
        while (i < ML) {
            var mes = nico.Messages[i];
            if (mes._deleted == 1 && (!filter1_flag[i] || !filter1_on) && (!filter2_flag[i] || !filter2_on) && (!filter3_flag[i] || !filter3_on) && (!filter4_flag[i] || !filter4_on)) {
                cand_ng_id.push({
                    user_id: fwMessages[i].user_id,
                    date: 0,
                    message: fwMessages[i]._message,
                    vpos: fwMessages[i]._vpos,
                    no: fwMessages[i].no,
                    msgs: 'current'
                });
                mes._mine = true;
                mes._deleted = 0;
                filter_count--;
                var vpos = nico.player.__get__playheadTime();
                if (vpos >= mes._vstart && vpos <= mes._vend) {
                    nico.ShowMessage(mes, nico.Messages);
                }
            } else if (mes._mine == true) {
                mes._mine = false;
                var vpos = nico.player.__get__playheadTime();
                if (vpos >= mes._vstart && vpos <= mes._vend) {
                    nico.HideMessage(mes, nico.MessageSlots);
                    nico.ShowMessage(mes, nico.Messages);
                }
            }
            i++;
        }
        updateNGIDMenu("ng_ids");
        if (cand_ng_id.length > 0) {
            updateLogList("cand_ng_id");
        } else {
            updateLogList("clear");
        }
        showInfoOnMainBar("NGIDをクリアしました(" + cand_ng_id.length + "件表示)");
        showInfoOnBtn("filter5", ngid_filter_count);
    } else if (mode == "clear_filter") {
        update_info = true;
        filter1_on = false;
        filter2_on = false;
        filter3_on = false;
        filter4_on = false;
        if (Key.isDown(ngid_off_key_code) || ngid_off_key_code == 0) {
            filter5_on = false;
        }
        cand_ng_id = new Array();
        updateLogList("clear");
        ML = fwMessages.length;
        i = 0;
        while (i < ML) {
            var mes = nico.Messages[i];
            var flag;
            if (mes._deleted == 1 && (!ngid_filter_flag[i] || !filter5_on)) {
                cand_ng_id.push({
                    user_id: fwMessages[i].user_id,
                    date: 0,
                    message: fwMessages[i]._message,
                    vpos: fwMessages[i]._vpos,
                    no: fwMessages[i].no,
                    msgs: 'current'
                });
                mes._mine = true;
                mes._deleted = 0;
                filter_count--;
                var vpos = nico.player.__get__playheadTime();
                if (vpos >= mes._vstart && vpos <= mes._vend) {
                    nico.ShowMessage(mes, nico.Messages);
                }
            } else if (mes._deleted == 0 && mes._mine == true) {
                mes._mine = false;
                var vpos = nico.player.__get__playheadTime();
                if (vpos >= mes._vstart && vpos <= mes._vend) {
                    nico.HideMessage(mes, nico.MessageSlots);
                    nico.ShowMessage(mes, nico.Messages);
                }
            }
            i++;
        }
        if (cand_ng_id.length > 0) {
            updateLogList("cand_ng_id");
        }
        showInfoOnMainBar("フィルターを解除しました(" + cand_ng_id.length + "件表示)");
    }
    /*Kakikomi系の処理*/
    else if (mode == "clear_kakikomi") {
        kaki_txt = new Array();
        kaki_txt_so.data.ids = new Array();
        kaki_txt_so.flush();
        updateKakikomiMenu("close");
        showInfoOnMainBar("Kakikomiを削除しました");
    }
    /*Delを含めたコメントを表示する...分からん
    else if(mode == "clear_all_messages"){
        update_info = true;
        filter1_on = false;
        filter2_on = false;
        filter3_on = false;
        filter4_on = false;
        if(Key.isDown(ngid_off_key_code) || ngid_off_key_code == 0){filter5_on = false;}
        cand_ng_id = new Array();
        updateLogList("clear");
        ML = nico.comma_separated(nico.last_resno + int(offset));
        i = 0;
        while(i < ML){
            var mes = nico.Messages[i];
            trace(mes._deleted);//NGフィルタにかかったコメント数
            var flag;
            if(mes._deleted == 1){
                cand_ng_id.push({user_id: fwMessages[i].user_id, date: 0, message: fwMessages[i]._message, vpos: fwMessages[i]._vpos, no:fwMessages[i].no, msgs: 'current'});
                mes._mine = true;
                mes._deleted = 0;
                filter_count--;
                var vpos = nico.player.__get__playheadTime();
                if(vpos >= mes._vstart && vpos <= mes._vend){
                    nico.ShowMessage(mes, nico.Messages);
                }
            }else if(mes._deleted == 0 && mes._mine == true){
                mes._mine = false;
                var vpos = nico.player.__get__playheadTime();
                if(vpos >= mes._vstart && vpos <= mes._vend){
                    nico.HideMessage(mes,nico.MessageSlots);
                    nico.ShowMessage(mes, nico.Messages);
                }
            }
            i++;
        }
        if(cand_ng_id.length > 0){updateLogList("cand_ng_id");}
        showInfoOnMainBar("フィルターを解除しました(" + cand_ng_id.length + "件表示)");
    }
*/
    if (update_info) {
        showFilterInfo(filter_count, ML);
        if (show_info) {
            showInfoOnScreen(filter_count + "/" + ML, 60);
        }
    }
}
//NGIDフラグたててカウント++

function NGIDFlagOn(no) {
    if (!ngid_filter_flag[no]) {
        ngid_filter_count++;
        ngid_filter_flag[no] = true;
    }
}

function fwHideMessage(mes) {
    if (mes._deleted == 0) {
        mes._deleted = 1;
        filter_count++;
        if (mes._slot != undefined) {
            nico.HideMessage(mes, nico.MessageSlots);
        }
    }
}
function showInfoOnBtn(btn_name, count) {
    main_bar[btn_name].count.text = count;
    main_bar[btn_name].count.setTextFormat(white10_fmt);
    main_bar[btn_name].count._x = 0 - main_bar[btn_name].count._width / 2;
}
//バイナリサーチの判定
//NGIDをソートするのか、新着メッセージをソートするのか、総当りで調べるのか
//NGIDは常にuser_idでソートされていて重複データもないので
//NGIDを優先的に検索するようにしたほうがいいはず
//けっこう適当な判定

function checkSearchMode(new_mes_length, ng_length) {
    if (new_mes_length * ng_length >= 10000) {
        if (ng_length >= 40) {
            return "ng_search";
        } else if (new_mes_length >= 500) {
            return "new_mes_search";
        } else {
            return "no_search";
        }
    } else if (new_mes_length * ng_length >= 1000) {
        if (ng_length >= 20) {
            return "ng_search";
        } else if (new_mes_length >= 250) {
            return "new_mes_search";
        } else {
            return "no_search";
        }
    } else {
        return "no_search";
    }
}
function parseCommand(command_line) {
    if (command_line == "" || command_line == undefined) {
        return undefined;
    }
    var list = command_line.split("&"); //ex. place=(ue|shita)
    var param = new Array();
    for (var i = 0; i < list.length; i++) {
        var temp = new Array();
        temp = list[i].split("=");
        param[temp[0]] = temp[1]; //ex. param["place"] = "(ue|shita)"
    }
    var filter = new Array();
    var command = new Array("place", "size", "color", "vpos", "limit", "mes");
    var null_checker = true;
    for (var i = 0; i < command.length; i++) {
        if (param[command[i]] != undefined) {
            if (param[command[i]].substr(0, 1) == "(" && param[command[i]].substr(-1) == ")") {
                param[command[i]] = param[command[i]].substr(1, param[command[i]].length - 2); //ex. param["place"] = "ue|shita"
            }
            var status = param[command[i]].split("|"); //ex. status[0] = "ue" status[1] = "shita"
            filter[command[i]] = new Array();
            for (var j = 0; j < status.length; j++) {
                if (command[i] == "limit") {
                    if (checkNum(status[j])) {
                        filter["limit"].push(Number(status[j]));
                        null_checker = false;
                        break;
                    }
                } else if (command[i] == "mes") {
                    if (status[j] != "") {
                        filter["mes"].push(status[j]);
                        null_checker = false;
                    }
                } else if (command[i] == "vpos") {
                    if (checkNum(status[j])) {
                        filter[command[i]].push(Number(status[j]));
                        null_checker = false;
                    }
                } else if (command[i] == "place") {
                    if (status[j] == "all") {
                        filter[command[i]].push("all");
                        null_checker = false;
                    } else if (status[j] == "normal") {
                        //normalの値はRC2から無指定になった
                        filter[command[i]].push("normal");
                        null_checker = false;
                    } else if (status[j] == "ue") {
                        filter[command[i]].push(1);
                        null_checker = false;
                    } else if (status[j] == "shita") {
                        filter[command[i]].push(2);
                        null_checker = false;
                    }
                } else if (command[i] == "size") {
                    if (status[j] == "all") {
                        filter[command[i]].push("all");
                        null_checker = false;
                    } else if (status[j] == "normal") {
                        filter[command[i]].push("normal");
                        null_checker = false;
                    } else if (status[j] == "big") {
                        filter[command[i]].push(39);
                        null_checker = false;
                    } else if (status[j] == "small") {
                        filter[command[i]].push(15);
                        null_checker = false;
                    }
                } else if (command[i] == "color") {
                    if (status[j] == "all") {
                        filter[command[i]].push("all");
                        null_checker = false;
                    } else if (status[j] == "normal") {
                        filter[command[i]].push("normal");
                        null_checker = false;
                    } else if (status[j] == "white") {
                        filter[command[i]].push(16777215);
                        null_checker = false;
                    } else if (status[j] == "red") {
                        filter[command[i]].push(16711680);
                        null_checker = false;
                    } else if (status[j] == "green") {
                        filter[command[i]].push(65280);
                        null_checker = false;
                    } else if (status[j] == "blue") {
                        filter[command[i]].push(255);
                        null_checker = false;
                    } else if (status[j] == "cyan") {
                        filter[command[i]].push(65535);
                        null_checker = false;
                    } else if (status[j] == "yellow") {
                        filter[command[i]].push(16776960);
                        null_checker = false;
                    } else if (status[j] == "purple") {
                        filter[command[i]].push(12583167);
                        null_checker = false;
                    } else if (status[j] == "pink") {
                        filter[command[i]].push(16744576);
                        null_checker = false;
                    } else if (status[j] == "orange") {
                        filter[command[i]].push(16760832);
                        null_checker = false;
                    } else if (status[j] == "niconicowhite") {
                        filter[command[i]].push(13421721);
                        null_checker = false;
                    } else if (status[j] == "white2") {
                        filter[command[i]].push(13421721);
                        null_checker = false;
                    } else if (status[j] == "marineblue") {
                        filter[command[i]].push(3407868);
                        null_checker = false;
                    } else if (status[j] == "blue2") {
                        filter[command[i]].push(3407868);
                        null_checker = false;
                    } else if (status[j] == "madyellow") {
                        filter[command[i]].push(10066176);
                        null_checker = false;
                    } else if (status[j] == "yellow2") {
                        filter[command[i]].push(10066176);
                        null_checker = false;
                    } else if (status[j] == "passionorange") {
                        filter[command[i]].push(16737792);
                        null_checker = false;
                    } else if (status[j] == "orange2") {
                        filter[command[i]].push(16737792);
                        null_checker = false;
                    } else if (status[j] == "nobleviolet") {
                        filter[command[i]].push(6697932);
                        null_checker = false;
                    } else if (status[j] == "purple2") {
                        filter[command[i]].push(6697932);
                        null_checker = false;
                    } else if (status[j] == "elementalgreen") {
                        filter[command[i]].push(52326);
                        null_checker = false;
                    } else if (status[j] == "green2") {
                        filter[command[i]].push(52326);
                        null_checker = false;
                    } else if (status[j] == "truered") {
                        filter[command[i]].push(13369395);
                        null_checker = false;
                    } else if (status[j] == "red2") {
                        filter[command[i]].push(13369395);
                        null_checker = false;
                    } else if (status[j] == "black") {
                        filter[command[i]].push(0);
                        null_checker = false;
                    } else if (status[j] == "premium") {
                        filter[command[i]].push(13421721);
                        filter[command[i]].push(3407868);
                        filter[command[i]].push(10066176);
                        filter[command[i]].push(16737792);
                        filter[command[i]].push(6697932);
                        filter[command[i]].push(52326);
                        filter[command[i]].push(13369395);
                        filter[command[i]].push(0);
                        null_checker = false;
                    }
                }
            }
        }
    }
    if (null_checker) {
        return undefined;
    } else {
        return filter;
    }
}
//★★★★★★★★★★★★★Hideバー 80～★★★★★★★★★★★★★
hide_bar.swapDepths(80);
hide_bar._visible = false;
//★★★★★★★★★★★★★コマンドバー 24000～★★★★★★★★★★★★★
command_bar.swapDepths(24000);
command_bar._visible = false;
command_bar.base.onPress = function() {
    var xm = command_bar._xmouse;
    if (xm < 22) {
        command_bar.startDrag();
    }
    goTopDepth(command_bar);
};
command_bar.base.onRelease = function() {
    command_bar.stopDrag();
    var xm = command_bar._xmouse;
    if (xm >= 920) {
        command_bar._visible = false;
    }
};
createSquareBtn(command_bar, "clear_all", "全消", white12b_fmt, 5, 46, 15, 36, 24, 0x303030);
command_bar.clear_all.onRelease = function() {
    input_chat_command("clear_all");
    this._alpha = 40;
};
createSquareBtn(command_bar, "white", "", undefined, 10, 79, 15, 18, 24, 0xffffff);
command_bar.white.onRelease = function() {
    input_chat_command("color", "white");
    this._alpha = 40;
};
createSquareBtn(command_bar, "pink", "", undefined, 15, 98, 15, 18, 24, 0xff8080);
command_bar.pink.onRelease = function() {
    input_chat_command("color", "pink");
    this._alpha = 40;
};
createSquareBtn(command_bar, "red", "", undefined, 16, 117, 15, 18, 24, 0xff0000);
command_bar.red.onRelease = function() {
    input_chat_command("color", "red");
    this._alpha = 40;
};
createSquareBtn(command_bar, "orange", "", undefined, 17, 136, 15, 18, 24, 0xffc000);
command_bar.orange.onRelease = function() {
    input_chat_command("color", "orange");
    this._alpha = 40;
};
createSquareBtn(command_bar, "yellow", "", undefined, 18, 155, 15, 18, 24, 0xffff00);
command_bar.yellow.onRelease = function() {
    input_chat_command("color", "yellow");
    this._alpha = 40;
};
createSquareBtn(command_bar, "green", "", undefined, 11, 174, 15, 18, 24, 0x00ff00);
command_bar.green.onRelease = function() {
    input_chat_command("color", "green");
    this._alpha = 40;
};
createSquareBtn(command_bar, "cyan", "", undefined, 12, 193, 15, 18, 24, 0x00ffff);
command_bar.cyan.onRelease = function() {
    input_chat_command("color", "cyan");
    this._alpha = 40;
};
createSquareBtn(command_bar, "blue", "", undefined, 13, 212, 15, 18, 24, 0x0000ff);
command_bar.blue.onRelease = function() {
    input_chat_command("color", "blue");
    this._alpha = 40;
};
createSquareBtn(command_bar, "purple", "", undefined, 14, 231, 15, 18, 24, 0xc000ff);
command_bar.purple.onRelease = function() {
    input_chat_command("color", "purple");
    this._alpha = 40;
};
createSquareBtn(command_bar, "white2", "", undefined, 19, 254, 15, 18, 24, 0xcccc99);
command_bar.white2.onRelease = function() {
    input_chat_command("color", "white2");
    this._alpha = 40;
};
command_bar.white2._visible = false;
createSquareBtn(command_bar, "red2", "", undefined, 23, 273, 15, 18, 24, 0xcc0033);
command_bar.red2.onRelease = function() {
    input_chat_command("color", "red2");
    this._alpha = 40;
};
command_bar.red2._visible = false;
createSquareBtn(command_bar, "orange2", "", undefined, 24, 292, 15, 18, 24, 0xff6600);
command_bar.orange2.onRelease = function() {
    input_chat_command("color", "orange2");
    this._alpha = 40;
};
command_bar.orange2._visible = false;
createSquareBtn(command_bar, "yellow2", "", undefined, 25, 311, 15, 18, 24, 0x999900);
command_bar.yellow2.onRelease = function() {
    input_chat_command("color", "yellow2");
    this._alpha = 40;
};
command_bar.yellow2._visible = false;
createSquareBtn(command_bar, "green2", "", undefined, 20, 330, 15, 18, 24, 0x00cc66);
command_bar.green2.onRelease = function() {
    input_chat_command("color", "green2");
    this._alpha = 40;
};
command_bar.green2._visible = false;
createSquareBtn(command_bar, "blue2", "", undefined, 21, 349, 15, 18, 24, 0x33fffc);
command_bar.blue2.onRelease = function() {
    input_chat_command("color", "blue2");
    this._alpha = 40;
};
command_bar.blue2._visible = false;
createSquareBtn(command_bar, "purple2", "", undefined, 22, 368, 15, 18, 24, 0x6633cc);
command_bar.purple2.onRelease = function() {
    input_chat_command("color", "purple2");
    this._alpha = 40;
};
command_bar.purple2._visible = false;
createSquareBtn(command_bar, "black", "", undefined, 26, 387, 15, 18, 24, 0x000000);
command_bar.black.onRelease = function() {
    input_chat_command("color", "black");
    this._alpha = 40;
};
command_bar.black._visible = false;
createSquareBtn(command_bar, "small", "小", black12b_fmt, 30, 254, 15, 18, 24, 0xffffff);
command_bar.small.onRelease = function() {
    input_chat_command("size", "small");
    this._alpha = 40;
};
createSquareBtn(command_bar, "big", "大", black12b_fmt, 31, 273, 15, 18, 24, 0xffffff);
command_bar.big.onRelease = function() {
    input_chat_command("size", "big");
    this._alpha = 40;
};
createSquareBtn(command_bar, "ue", "↑", black12b_fmt, 35, 296, 15, 18, 24, 0xffffff);
command_bar.ue.onRelease = function() {
    input_chat_command("place", "ue");
    this._alpha = 40;
};
createSquareBtn(command_bar, "shita", "↓", black12b_fmt, 36, 315, 15, 18, 24, 0xffffff);
command_bar.shita.onRelease = function() {
    input_chat_command("place", "shita");
    this._alpha = 40;
};
createSquareBtn(command_bar, "sage", "sage", black12b_fmt, 40, 347, 15, 36, 24, 0xffffff);
command_bar.sage.onRelease = function() {
    input_chat_command("sage", "sage");
    this._alpha = 40;
};
createSquareBtn(command_bar, "line", "改行", black12b_fmt, 45, 388, 15, 36, 24, 0xffffff);
command_bar.line.onRelease = function() {
    input_chat_command("chat", "\n");
    this._alpha = 40;
};
createSquareBtn(command_bar, "zero_width", "零幅", black12b_fmt, 46, 429, 15, 36, 24, 0xffffff);
command_bar.zero_width.onRelease = function() {
    input_chat_command("chat", "​");
    this._alpha = 40;
};
createSquareBtn(command_bar, "mincho", "明", black12b_fmt, 50, 461, 15, 18, 24, 0xffffff);
command_bar.mincho.onRelease = function() {
    input_chat_command("chat", "﹒");
    this._alpha = 40;
};
createSquareBtn(command_bar, "maru", "丸", black12b_fmt, 51, 484, 15, 18, 24, 0xffffff);
command_bar.maru.onRelease = function() {
    input_chat_command("chat", "ㅤ");
    this._alpha = 40;
};
createSquareBtn(command_bar, "aspect_sd", "4:3", white12b_fmt, 70, 828, 15, 36, 24, 0x303030);
command_bar.aspect_sd.onRelease = function() {
    changeAspect(4, 3);
    this._alpha = 40;
};
createSquareBtn(command_bar, "aspect_hd", "16:9", white12b_fmt, 71, 865, 15, 36, 24, 0x303030);
command_bar.aspect_hd.onRelease = function() {
    changeAspect(16, 9);
    this._alpha = 40;
};
createSquareBtn(command_bar, "smoothing", "滑", white12b_fmt, 82, 902, 15, 24, 24, 0x303030);
command_bar.smoothing.onRelease = function() {
    changeSmoothing(!smoothing, true);
    this._alpha = 40;
};
command_bar.smoothing.onRollOver = function() {
    if (!smoothing) {
        this._alpha = 60;
    }
};
command_bar.smoothing.onRollOut = function() {
    if (!smoothing) {
        this._alpha = 100;
    }
};
command_bar.smoothing.onReleaseOutside = command_bar.smoothing.onRollOut;
function input_chat_command(mode, command) {
    if (mode == 'clear_all') {
        nico.inputArea.MailInput.text = '';
        nico.inputArea.ChatInput1.text = '';
    } else if (mode == 'clear_mail') {
        nico.inputArea.MailInput.text = '';
    } else if (mode == 'chat') {
        nico.inputArea.ChatInput1.text += command;
    } else if (mode == 'color') {
        var tmp = nico.inputArea.MailInput.text;
        tmp = replaceSentence(tmp, 'pink ', '');
        tmp = replaceSentence(tmp, 'cyan ', '');
        tmp = replaceSentence(tmp, 'niconicowhite ', '');
        tmp = replaceSentence(tmp, 'white ', '');
        tmp = replaceSentence(tmp, 'white2 ', '');
        tmp = replaceSentence(tmp, 'marineblue ', '');
        tmp = replaceSentence(tmp, 'blue ', '');
        tmp = replaceSentence(tmp, 'blue2 ', '');
        tmp = replaceSentence(tmp, 'madyellow ', '');
        tmp = replaceSentence(tmp, 'yellow ', '');
        tmp = replaceSentence(tmp, 'yellow2 ', '');
        tmp = replaceSentence(tmp, 'passionorange ', '');
        tmp = replaceSentence(tmp, 'orange ', '');
        tmp = replaceSentence(tmp, 'orange2 ', '');
        tmp = replaceSentence(tmp, 'nobleviolet ', '');
        tmp = replaceSentence(tmp, 'purple ', '');
        tmp = replaceSentence(tmp, 'purple2 ', '');
        tmp = replaceSentence(tmp, 'elementalgreen ', '');
        tmp = replaceSentence(tmp, 'green ', '');
        tmp = replaceSentence(tmp, 'green2 ', '');
        tmp = replaceSentence(tmp, 'truered ', '');
        tmp = replaceSentence(tmp, 'red ', '');
        tmp = replaceSentence(tmp, 'red2 ', '');
        tmp = replaceSentence(tmp, 'black ', '');
        if (nico.inputArea.MailInput.text.indexOf(command) >= 0) {
            nico.inputArea.MailInput.text = tmp;
        } else {
            nico.inputArea.MailInput.text = command + ' ' + tmp;
        }
    } else if (mode == 'size') {
        var tmp = nico.inputArea.MailInput.text;
        tmp = replaceSentence(tmp, 'big ', '');
        tmp = replaceSentence(tmp, 'small ', '');
        if (nico.inputArea.MailInput.text.indexOf(command) >= 0) {
            nico.inputArea.MailInput.text = tmp;
        } else {
            nico.inputArea.MailInput.text = command + ' ' + tmp;
        }
    } else if (mode == 'place') {
        var tmp = nico.inputArea.MailInput.text;
        tmp = replaceSentence(tmp, 'naka ', '');
        //tmp = replaceSentence(tmp, 'ue ', '');
        var delete_flag = false;
        var index = tmp.indexOf(' ue ');
        while (index >= 0) {
            tmp = tmp.substring(0, index + 1).concat(tmp.substr(index + 4));
            delete_flag = true;
            index = tmp.indexOf(' ue ');
        }
        if (tmp.indexOf('ue ') == 0) {
            tmp = tmp.substr(3);
            delete_flag = true;
        }
        tmp = replaceSentence(tmp, 'shita ', '');
        if (nico.inputArea.MailInput.text.indexOf(command) < 0 || (command == 'ue' && !delete_flag)) {
            nico.inputArea.MailInput.text = command + ' ' + tmp;
        } else {
            nico.inputArea.MailInput.text = tmp;
        }
    } else if (mode == 'placeh') {
        var tmp = nico.inputArea.MailInput.text;
        tmp = replaceSentence(tmp, 'migi ', '');
        tmp = replaceSentence(tmp, 'hidari ', '');
        if (nico.inputArea.MailInput.text.indexOf(command) >= 0) {
            nico.inputArea.MailInput.text = tmp;
        } else {
            nico.inputArea.MailInput.text = command + ' ' + tmp;
        }
    } else if (mode == 'sage') {
        var tmp = nico.inputArea.MailInput.text;
        tmp = replaceSentence(tmp, 'sage ', '');
        if (nico.inputArea.MailInput.text.indexOf(command) >= 0) {
            nico.inputArea.MailInput.text = tmp;
        } else {
            nico.inputArea.MailInput.text = command + ' ' + tmp;
        }
    } else if (mode == '184') {
        var tmp = nico.inputArea.MailInput.text;
        tmp = replaceSentence(tmp, '184 ', '');
        if (nico.inputArea.MailInput.text.indexOf(command) >= 0) {
            nico.inputArea.MailInput.text = tmp;
        } else {
            nico.inputArea.MailInput.text = command + ' ' + tmp;
        }
    }
}
function changeAspect(x, y) {
    if (nico.isShiSwfPlayer()) return;
    var max_video_w = nico.player.video_max_width;
    var max_video_h = nico.player.video_max_height;
    if (x == y) {
        // 同じ比率の場合小さい方に合わせる
        nico.video_base_video._height = max_video_h;
        nico.video_base_video._width = max_video_h;
        var tmp_x = (max_video_w - max_video_h) / 2;
        var tmp_y = 0; // def_video_y
    } else if (x / y >= 4 / 3) {
        // 4:3 (1.33...:1) より横長である場合
        nico.video_base_video._width = max_video_w; // 大きい方を最大値にする
        nico.video_base_video._height = Math.round(max_video_w / x * y);
        var tmp_x = 0; //def_video_x  デフォルトが4:3とは限らないので決めうち
        var tmp_y = (max_video_h - Math.round(max_video_w / x * y)) / 2;
    } else {
        // 縦長である場合
        nico.video_base_video._height = max_video_h; // 大きい方を最大値にする
        nico.video_base_video._width = Math.round(max_video_h / y * x);
        var tmp_x = (max_video_w - Math.round(max_video_h / y * x)) / 2;
        var tmp_y = 0; // def_video_y
    }
    if (mirror_flag) {
        nico.video_base_video._x = nico.video_base_video._width + tmp_x;
    } else {
        nico.video_base_video._x = tmp_x;
    }
    if (rotation_flag) {
        nico.video_base_video._y = nico.video_base_video._height + tmp_y;
    } else {
        nico.video_base_video._y = tmp_y;
    }
    // _width か _height を変えると両方正数になってしまうので修正
    if (mirror_flag) {
        nico.video_base_video._xscale = nico.video_base_video._xscale * -1;
    }
    if (rotation_flag) {
        nico.video_base_video._yscale = nico.video_base_video._yscale * -1;
    }
    // 現在のアスペクトレート
    //tmp = Math.round(x*100)/100+':'+Math.round(y*100)/100;
}
//コメントをローカルcgiにポストする

function sendLocalXML() {
    auto_comment_status = "connecting";
    autoCommentPostIconRotate("start");
    var post_data = new XML();
    var first_no = fwMessages[0]._no;
    var last_no = fwMessages[fwMessages.length - 1]._no;
    var no = local_last_no + 1; //no番以降のコメントを送信したい
    if (first_no > local_last_no) {
        no = first_no;
    }
    //fwMessagesの_noは小さい順に並んでいるはずなので
    var fwNo = -1;
    while (fwNo == -1 && no <= last_no) { //めったにないけどnoが飛び番号で存在しなかった場合のループ
        var fwNo = binarySearch(fwMessages, "_no", no);
        no++;
    }
    //↑fwMessages[fwNo]以降を送信すればいいということになるはず
    var node = post_data.createElement("send");
    node.attributes.total_count = local_total_count;
    node.attributes.last_no = local_last_no;
    node.attributes.name = VIDEO;
    post_data.appendChild(node);
    for (var i = fwNo; i < fwMessages.length; i++) {
        var mes = fwMessages[i];
        node = post_data.createElement("chat");
        node.appendChild(post_data.createTextNode(mes._message));
        node.attributes.vpos = mes.vpos;
        if (mes.user_id != undefined && mes.user_id != "") {
            node.attributes.user_id = mes.user_id;
        }
        if (mes.thread != undefined && mes.thread != "") {
            node.attributes.thread = mes.thread;
        }
        if (mes.premium != undefined && mes.premium != "") {
            node.attributes.premium = mes.premium;
        }
        node.attributes.no = mes._no;
        if (mes.name != undefined && mes.name != "") {
            node.attributes.name = mes.name;
        }
        if (mes.mail != undefined && mes.mail != "") {
            node.attributes.mail = mes.mail;
        }
        if (mes.date != undefined && mes.date != "") {
            node.attributes.date = mes.date;
        }
        post_data.appendChild(node);
    }
    post_data.contentType = "text/xml";
    post_data.addRequestHeader("File-Name", VIDEO); //なんとなく
    var result = new XML(); //返答を格納する場所の準備
    result.onLoad = function(success) {
        var node = result.firstChild;
        if (success && node.nodeName == "result") {
            local_last_no = Number(node.attributes.last_no);
            local_total_count = Number(node.attributes.total_count);
            var add_count = node.attributes.add_count;
            add_count = add_count - 0;
            total_add_count += add_count;
            var T1 = main_bar.auto_comment_info1;
            var T2 = main_bar.auto_comment_info2;
            T1.text = "+" + total_add_count;
            T2.text = local_total_count;
            T1.setTextFormat(black14b_fmt);
            T2.setTextFormat(black14b_fmt);
            T1._x = 682 - T1.textWidth / 2;
            T2._x = 682 - T2.textWidth / 2;
            main_bar.auto_comment_info_line._visible = true;
        } else {
            nico.AddSystemMessage("コメント自動収集に失敗しました");
            auto_comment_post = false;
        }
        auto_comment_status = "ready";
        autoCommentPostIconRotate("stop");
        if (getflv_status == "waiting") {
            getflv_status = "ready";
        }
    };
    var crossdomain_dir = comment_server.substring(0, comment_server.lastIndexOf("/") + 1);
    System.security.loadPolicyFile(crossdomain_dir + "crossdomain.xml");
    post_data.checkPolicyFile = true;
    post_data.sendAndLoad(comment_server, result);
}
//ローカルcgiに保存済みのコメント情報を要求する

function countLocalXML(video_num) {
    auto_comment_status = "connecting";
    autoCommentPostIconRotate("start");
    var post_data = new XML();
    var node = post_data.createElement("count");
    node.attributes.name = video_num;
    post_data.appendChild(node);
    post_data.contentType = "text/xml";
    post_data.addRequestHeader("File-Name", video_num); //なんとなく
    var result = new XML(); //返答を格納する場所の準備
    result.onLoad = function(success) {
        var node = result.firstChild;
        if (success && node.nodeName == "result") {
            local_last_no = Number(node.attributes.last_no);
            local_total_count = Number(node.attributes.total_count);
            var add_count = node.attributes.add_count;
            add_count = add_count - 0;
            total_add_count += add_count;
            var T1 = main_bar.auto_comment_info1;
            var T2 = main_bar.auto_comment_info2;
            T1.text = "+" + total_add_count;
            T2.text = local_total_count;
            T1.setTextFormat(black14b_fmt);
            T2.setTextFormat(black14b_fmt);
            T1._x = 682 - T1.textWidth / 2;
            T2._x = 682 - T2.textWidth / 2;
            main_bar.auto_comment_info_line._visible = true;
        } else {
            nico.AddSystemMessage("ローカルコメント自動取得に失敗しました");
            auto_comment_post = false;
        }
        auto_comment_status = "ready";
        autoCommentPostIconRotate("stop");
        if (getflv_status == "waiting") {
            getflv_status = "ready";
        }
    };
    var crossdomain_dir = comment_server.substring(0, comment_server.lastIndexOf("/") + 1);
    System.security.loadPolicyFile(crossdomain_dir + "crossdomain.xml");
    post_data.checkPolicyFile = true;
    post_data.sendAndLoad(comment_server, result);
}
//ローカルcgiにコメントを要求する

function loadLocalXML(video_num, from, to) {
    auto_comment_status = "connecting";
    autoCommentPostIconRotate("start");
    var post_data = new XML();
    var node = post_data.createElement("load");
    node.attributes.to = to;
    node.attributes.from = from;
    node.attributes.name = video_num;
    post_data.appendChild(node);
    post_data.contentType = "text/xml";
    post_data.addRequestHeader("File-Name", video_num); //なんとなく
    var result = new XML(); //返答を格納する場所の準備
    result.onLoad = function(success) {
        var node = result.firstChild;
        if (success) {
            ClearLog();
            nico.Connection.onCMsgGetThreadResult(0, 0, 0, 0);
            nico.onCMsgViewCounter(0);
            var count = 0;
            for (var elem = result.firstChild; elem; elem = elem.nextSibling) {
                if (elem.nodeName == "chat") {
                    nico.Connection.onCMsgChat(elem.firstChild.nodeValue, elem.attributes.thread, elem.attributes.no, elem.attributes.vpos, elem.attributes.date, elem.attributes.mail, elem.attributes.name, elem.attributes.yourpost, elem.attributes.user_id, elem.attributes.raw_user, elem.attributes.deleted, elem.attributes.premium, elem.attributes.anonymity, elem.attributes.fork);
                    count++;
                }
            }
            nico.closeInterval();
            nico.AddSystemMessage(from + "～" + to + "までのコメント\(" + count + "件\)を読み込みました");
        } else {
            nico.AddSystemMessage("ローカルコメント読み込みに失敗しました");
            nico.player.play();
        }
        auto_comment_status = "ready";
        autoCommentPostIconRotate("stop");
    };
    var crossdomain_dir = comment_server.substring(0, comment_server.lastIndexOf("/") + 1);
    System.security.loadPolicyFile(crossdomain_dir + "crossdomain.xml");
    post_data.checkPolicyFile = true;
    post_data.sendAndLoad(comment_server, result);
}
//xmlファイルをコメントとして読み込んでみる

function loadLocalXML2(xml_url) {
    auto_comment_status = "connecting";
    autoCommentPostIconRotate("start");
    var result = new XML(); //返答を格納する場所の準備
    result.onLoad = function(success) {
        var node = result.firstChild;
        if (success && node.nodeName == "packet") {
            node = node.firstChild;
        }
        if (success) {
            ClearLog();
            nico.Connection.onCMsgGetThreadResult(0, 0, 0, 0);
            nico.onCMsgViewCounter(0);
            var count = 0;
            for (var elem = node; elem; elem = elem.nextSibling) {
                if (elem.nodeName == "chat") {
                    nico.Connection.onCMsgChat(elem.firstChild.nodeValue, elem.attributes.thread, elem.attributes.no, elem.attributes.vpos, elem.attributes.date, elem.attributes.mail, elem.attributes.name, elem.attributes.yourpost, elem.attributes.user_id, elem.attributes.raw_user, elem.attributes.deleted, elem.attributes.premium, elem.attributes.anonymity, elem.attributes.fork);
                    count++;
                }
            }
            nico.closeInterval();
            nico.AddSystemMessage("xmlファイルのコメント\(" + count + "件\)を読み込みました");
        } else {
            nico.AddSystemMessage("ローカルコメント読み込みに失敗しました");
            nico.player.play();
        }
        auto_comment_status = "ready";
        autoCommentPostIconRotate("stop");
    };
    result.Load(xml_url);
}
//マウスホイール
//そのつど個別にaddとremoveしたほうがいいんじゃないかと思いつつ、そのまんま
var wheel_listener = new Object();
wheel_listener.onMouseWheel = function(delta, target) {
    if (test_mode) {
        if (Key.isDown(17)) {
            alert_js(target + "/D" + target.getDepth() + "/W" + target._width + "/H" + target._height + "/XS" + target._xscale + "/YS" + target._yscale + "/X" + target._x + "/Y" + target._y);
        } else {
            //mylist_js(target);
        }
    }
    //showInfoOnMainBar(target);
    //System.setClipboard(target);
    if ((hideUI_flag || hideUI_id != undefined) && (timed_hide_header || timed_hide_inputarea)) {
        setHideUITimer();
    }
    while (target != undefined) {
        if (target == nico.videowindow) {
            break;
        } else if (target == screen) {
            break;
        } else if (target == nico.controller.loaded) {
            break;
        } else if (target == nico.controller.Knob_mc) {
            break;
        } else if (target == nico.controller.controller_submenu.sound_bar) {
            break;
        } else if (target == pref_menu.label_mouse_backward) {
            break;
        } else if (target == pref_menu.input_mouse_backward) {
            break;
        } else if (target == pref_menu.label_mouse_forward) {
            break;
        } else if (target == pref_menu.input_mouse_forward) {
            break;
        } else if (target == pref_menu.label_wheel_volume_value) {
            break;
        } else if (target == pref_menu.input_wheel_volume_value) {
            break;
        } else if (target == pref_menu.label_timed_hide_timelimit) {
            break;
        } else if (target == pref_menu.input_timed_hide_timelimit) {
            break;
        } else if (target == pref_menu.label_inputarea_alpha) {
            break;
        } else if (target == pref_menu.input_inputarea_alpha) {
            break;
        } else if (target == pref_menu.label_cm_inputarea_alpha) {
            break;
        } else if (target == pref_menu.input_cm_inputarea_alpha) {
            break;
        } else if (target == pref_menu.input_comment_alpha) {
            break;
        } else if (target == link_thumb) {
            break;
        } else if (target == ngid_menu.mes) {
            break;
        } else if (target == kakikomi_menu.mes) {
            break;
        }
        //else if(target == hide_bar.wayback_tab_reg){break;}
        target = target._parent;
    }
    if (target == nico.videowindow || target == screen) {
        if (mouse_wheel) {
            if (mouse_reverse) {
                delta = 0 - delta;
            }
            if (delta < 0) {
                relativeSeek('forward');
            } else if (delta > 0) {
                relativeSeek('backward');
            }
        } else if (wheel_volume) {
            //ボリュームを増減
            if (delta < 0) {
                nico.player.setVolume(nico.player.getVolume() - wheel_volume_value, false);
            } else if (delta > 0) {
                nico.player.setVolume(nico.player.getVolume() + wheel_volume_value, false);
            }
        }
    } else if (target == nico.controller.loaded || target == nico.controller.Knob_mc) {
        if (mouse_reverse) {
            delta = 0 - delta;
        }
        if (delta < 0) {
            relativeSeek('forward');
        } else if (delta > 0) {
            relativeSeek('backward');
        }
    } else if (target == nico.controller.controller_submenu.sound_bar) {
        //ボリュームを増減
        if (delta < 0) {
            nico.player.setVolume(nico.player.getVolume() - wheel_volume_value, false);
        } else if (delta > 0) {
            nico.player.setVolume(nico.player.getVolume() + wheel_volume_value, false);
        }
    } else if (target == pref_menu.input_mouse_backward || target == pref_menu.label_mouse_backward) {
        if (delta < 0) {
            var num = Number(pref_menu.input_mouse_backward.text) - 1;
        } else {
            var num = Number(pref_menu.input_mouse_backward.text) + 1;
        }
        if (num < 1) {
            num = 1;
        }
        mouse_backward = num;
        pref_menu.input_mouse_backward.text = num;
        mouse_wheel_so.data.backward = mouse_backward;
        mouse_wheel_so.flush();
    } else if (target == pref_menu.input_mouse_forward || target == pref_menu.label_mouse_forward) {
        if (delta < 0) {
            var num = Number(pref_menu.input_mouse_forward.text) - 1;
        } else {
            var num = Number(pref_menu.input_mouse_forward.text) + 1;
        }
        if (num < 1) {
            num = 1;
        }
        mouse_forward = num;
        pref_menu.input_mouse_forward.text = num;
        mouse_wheel_so.data.forward = mouse_forward;
        mouse_wheel_so.flush();
    } else if (target == pref_menu.input_wheel_volume_value || target == pref_menu.label_wheel_volume_value) {
        if (delta < 0) {
            var num = Number(pref_menu.input_wheel_volume_value.text) - 1;
        } else {
            var num = Number(pref_menu.input_wheel_volume_value.text) + 1;
        }
        if (num < 1) {
            num = 1;
        }
        wheel_volume_value = num;
        pref_menu.input_wheel_volume_value.text = num;
        wheel_volume_so.data.value = wheel_volume_value;
        wheel_volume_so.flush();
    } else if (target == pref_menu.input_inputarea_alpha || target == pref_menu.label_inputarea_alpha) {
        if (delta < 0) {
            var num = Number(pref_menu.input_inputarea_alpha.text) - 1;
        } else {
            var num = Number(pref_menu.input_inputarea_alpha.text) + 1;
        }
        if (num < 0) {
            num = 0;
        }
        inputarea_alpha = num;
        pref_menu.input_inputarea_alpha.text = num;
        transparent_inputarea_so.data.alpha = inputarea_alpha;
        transparent_inputarea_so.flush();
    } else if (target == pref_menu.input_cm_inputarea_alpha || target == pref_menu.label_cm_inputarea_alpha) {
        if (delta < 0) {
            var num = Number(pref_menu.input_cm_inputarea_alpha.text) - 1;
        } else {
            var num = Number(pref_menu.input_cm_inputarea_alpha.text) + 1;
        }
        if (num < 0) {
            num = 0;
        }
        cm_inputarea_alpha = num;
        pref_menu.input_cm_inputarea_alpha.text = num;
        cm_transparent_inputarea_so.data.alpha = cm_inputarea_alpha;
        cm_transparent_inputarea_so.flush();
    } else if (target == pref_menu.input_timed_hide_timelimit || target == pref_menu.label_timed_hide_timelimit) {
        if (delta < 0) {
            var num = Number(pref_menu.input_timed_hide_timelimit.text) - 1;
        } else {
            var num = Number(pref_menu.input_timed_hide_timelimit.text) + 1;
        }
        if (num < -1) {
            num = -1;
        }
        timed_hide_timelimit = num;
        pref_menu.input_timed_hide_timelimit.text = num;
        timed_hide_timelimit_so.data.value = timed_hide_timelimit;
        timed_hide_timelimit_so.flush();
    } else if (target == pref_menu.input_comment_alpha) {
        if (delta < 0) {
            var num = Number(pref_menu.input_comment_alpha.text) - 1;
        } else {
            var num = Number(pref_menu.input_comment_alpha.text) + 1;
        }
        if (num < 0) {
            num = 0;
        }
        comment_alpha = num;
        pref_menu.input_comment_alpha.text = num;
        transparent_comment_so.data.alpha = comment_alpha;
        transparent_comment_so.flush();
    } else if (target == link_thumb) {
        if (delta < 0) {
            updateLinkThumb("next", -1, -1);
        } else if (delta > 0) {
            updateLinkThumb("before", -1, -1);
        }
    } else if (target == ngid_menu.mes) {
        if (delta < 0) {
            scrollNGIDMenu(1);
        } else if (delta > 0) {
            scrollNGIDMenu(-1);
        }
    } else if (target == kakikomi_menu.mes) {
        if (delta < 0) {
            scrollKakikomiMenu(1);
        } else if (delta > 0) {
            scrollKakikomiMenu(-1);
        }
    }
    /*else if(target == hide_bar.wayback_tab_reg){//過去ログのボタン
        if(delta < 0){
            trace(nico.tabmenu.wayback_menu.wayback_date.selectedDate);
                nico.tabmenu.wayback_menu.wayback_hour.value = nico.ThreadCreateDate.getHours();
                nico.tabmenu.wayback_menu.wayback_min.value  = nico.ThreadCreateDate.getMinutes();
                trace(nico.tabmenu.wayback_menu.wayback_date.selectableRange.rangeStart + " sel "+nico.tabmenu.wayback_menu.wayback_date.selectedDate);
                var tmp_date = new Date();
                tmp_date = nico.tabmenu.wayback_menu.wayback_date.selectableRange.rangeStart;
                nico.tabmenu.wayback_menu.wayback_date.selectedDate = nico.tabmenu.wayback_menu.wayback_date.selectableRange.rangeStart;
                nico.tabmenu.wayback_menu.wayback_date.selectedDate.setTime(nico.tabmenu.wayback_menu.wayback_date.selectedDate.getTime() + (24 * 3600 * 1000));
                nico.tabmenu.wayback_menu.wayback_date.selectableRange.rangeStart = tmp_date;
        }else if(delta > 0){
            nico.tabmenu.wayback_menu.wayback_date.selectedDate.setTime(nico.tabmenu.wayback_menu.wayback_date.selectedDate.getTime() - (24 * 3600 * 1000));
        }
    }*/
};
Mouse.addListener(wheel_listener);
//ショートカットキー
var key_listener = new Object();
key_listener.onKeyDown = function() {
    if ((hideUI_flag || hideUI_id != undefined) && (timed_hide_header || timed_hide_inputarea)) {
        setHideUITimer();
    }
    if (!key_operation) {
        return;
    }
    var target = Selection.getFocus();
    var key = Key.getCode();
    //showInfoOnMainBar(key+","+target);
    //System.setClipboard(target);
    if (target == null || target == "_level0.screen" || target == "_level0.bg" || target.substr(8, 16) == "nico.controller." || target.substr(8, 25) == "nico.tabmenu.relation_tab") {
        switch (key) {
        case 8:
            nico.player.__set__playheadTime(0);
            break;
        case 13:
            if (!nico.isLargeScreen) {
                nico.controller.controller_submenu.LargeScreenButton.onRelease();
            } else {
                nico.controller.controller_submenu.NormalScreenButton.onRelease();
            }
            break;
        case 16:
            if (force_hideUI) {
                force_hideUI = false;
            } else {
                force_hideUI = true;
                hideUI();
            }
            break;
        case 17:
            Selection.setFocus(nico.inputArea.ChatInput1);
            break;
        case 32:
            nico.player.pause();
            break;
        case 37:
            relativeSeek('backward');
            break;
        case 38:
            nico.player.setVolume(nico.player.getVolume() + wheel_volume_value, false);
            break;
        case 39:
            relativeSeek('forward');
            break;
        case 40:
            nico.player.setVolume(nico.player.getVolume() - wheel_volume_value, false);
            break;
        case 67:
            nico.inputArea.commandLabel.onRelease();
            break;
        case 68:
            if (main_bar.download._visible) {
                main_bar.download.onRelease();
            }
            main_bar.download._alpha = 100;
            break;
        case 72:
            if (nico.controller.controller_submenu.OverlayOff._visible) {
                nico.controller.controller_submenu.OverlayOff.onRelease();
            } else if (nico.controller.controller_submenu.OverlayOn._visible) {
                nico.controller.controller_submenu.OverlayOn.onRelease();
            }
            break;
        case 76:
            main_bar.link.onRelease();
            main_bar.link._alpha = 100;
            break;
        case 77:
            if (nico.controller.controller_submenu.Mute_btn._visible) {
                nico.controller.controller_submenu.Mute_btn.onRelease();
            } else if (nico.controller.controller_submenu.NoMute_btn._visible) {
                nico.controller.controller_submenu.NoMute_btn.onRelease();
            }
            break;
        case 78:
            main_bar.ngid_view.onRelease();
            main_bar.ngid_view._alpha = 100;
            break;
        case 80:
            main_bar.pref_menu.onRelease();
            main_bar.pref_menu._alpha = 100;
            break;
        case 81:
            createNGfield();
            break;
        case 82:
            if (nico.controller.controller_submenu.ReplayOff._visible) {
                nico.controller.controller_submenu.ReplayOff.onRelease();
            } else if (nico.controller.controller_submenu.ReplayOn._visible) {
                nico.controller.controller_submenu.ReplayOn.onRelease();
            }
            break;
        case 83:
            changeSmoothing(!smoothing, true);
            break;
        case 84:
            thumb_toggle();
            break;
        case 107:
            nico.controller.controller_submenu.LargeScreenButton.onRelease();
            break;
        case 189:
            nico.controller.controller_submenu.NormalScreenButton.onRelease();
            break;
        }
    } else if (target == "_level0.link_thumb") {
        if (key == 38) {
            updateLinkThumb("before", -1, -1);
        } else if (key == 40) {
            updateLinkThumb("next", -1, -1);
        }
    } else if (target == "_level0.ngid_menu.mes") {
        if (key == 38) {
            scrollNGIDMenu(-1);
        } else if (key == 40) {
            scrollNGIDMenu(1);
        }
    } else if (target == "_level0.kakikomi_menu.mes") {
        if (key == 38) {
            scrollKakikomiMenu(-1);
        } else if (key == 40) {
            scrollKakikomiMenu(1);
        }
    } else if (target == "_level0.ngword_filed.ngword") {
        if (key == 27) {
            createNGfield();
        } else if (key == 17) {
            pressflag = true;
        } else if (key == 13) {
            if (pressflag) {
                ngword_filed.ngword_submit.onRelease();
            } else {
                ngword_filed.ngword_submit.onRelease();
                ngword_filed._visible = false;
            }
        } else {
            pressflag = false;
        }
    }
};
Key.addListener(key_listener);
function relativeSeek(mode) {
    if (timeLine.check_seek.onEnterFrame == undefined) {
        var now = nico.player.__get__playheadTime();
        var playing_flag = false;
        var state = nico.player.__get__state();
        if (state == "playing") {
            playing_flag = true;
        }
        if (mode == 'forward') {
            //プレイヤーの座標(xm:0～544,ym:0～384)
            var xm = nico.videowindow._xmouse;
            var ym = nico.videowindow._ymouse;
            if (484 < xm && xm < Stage.width && 193 < ym && ym < Stage.height) {
                var jump_time = now + mouse_forward * 7;
            } else {
                var jump_time = now + mouse_forward;
            }
            //          trace("x:"+xm+"  y:"+ym);
            //          trace(jump_time);
            if (video_info.lastkeyframetimestamp) {
                if (jump_time > video_info.lastkeyframetimestamp) {
                    jump_time = video_info.lastkeyframetimestamp;
                }
            }
            if (jump_time > nico.player._contentLength - 5) {
                jump_time = nico.player._contentLength - 5;
            }
            if (video_info.keyframes.times.length > 0) {
                //二分探索でシーク位置を決定
                var l = 0;
                var r = video_info.keyframes.times.length;
                if (jump_time > video_info.keyframes.times[r - 1]) {
                    l = r - 1;
                } else {
                    while (l < r) {
                        var m = (((l + r) / 2) | 0);
                        if (video_info.keyframes.times[m] > jump_time) {
                            r = m - 1;
                        } else if (video_info.keyframes.times[m] < jump_time) {
                            l = m + 1;
                        } else {
                            break;
                        }
                    }
                    if (video_info.keyframes.times[l] < jump_time) {
                        l++;
                    }
                }
                /*
                for(var l=video_info.keyframes.times.length-1; l>=0; l--){
                    if(video_info.keyframes.times[l] <= jump_time){break;}
                }
                */
                jump_time = ((video_info.keyframes.times[l]) | 0);
                nico.player.__set__playheadTime(jump_time);
                if (playing_flag) {
                    setCheckPlayingInterval();
                }
            } else if (video_info.seekpoints.length > 0) {
                //二分探索でシーク位置を決定
                var l = 0;
                var r = video_info.seekpoints.length;
                if (jump_time > video_info.seekpoints[r - 1].time) {
                    l = r - 1;
                } else {
                    while (l < r) {
                        var m = (((l + r) / 2) | 0);
                        if (video_info.seekpoints[m].time > jump_time) {
                            r = m - 1;
                        } else if (video_info.seekpoints[m].time < jump_time) {
                            l = m + 1;
                        } else {
                            break;
                        }
                    }
                    if (video_info.seekpoints[l].time < jump_time) {
                        l++;
                    }
                }
                /*
                for(var l=video_info.seekpoints.length-1; l>=0; l--){
                    if(video_info.seekpoints[l].time <= jump_time){break;}
                }
                */
                jump_time = Math.ceil(video_info.seekpoints[l].time);
                nico.player.__set__playheadTime(jump_time);
                if (playing_flag) {
                    setCheckPlayingInterval();
                }
            } else if (movie_type == 'mp4' && force_seek) {
                checkSeek(now, 'forward');
            } else {
                nico.player.__set__playheadTime(jump_time);
                if (playing_flag) {
                    setCheckPlayingInterval();
                }
            }
        } else if (mode == 'backward') {
            var xm = nico.videowindow._xmouse;
            var ym = nico.videowindow._ymouse;
            if (484 < xm && xm < 544 && 193 < ym && ym < 384) {
                var jump_time = now - mouse_backward * 7;
            } else {
                var jump_time = now - mouse_backward;
            }
            if (jump_time <= 0) {
                nico.player.__set__playheadTime(0);
                if (playing_flag) {
                    setCheckPlayingInterval();
                }
            } else if (video_info.keyframes.times.length > 0) {
                //二分探索でシーク位置を決定
                var l = 0;
                var r = video_info.keyframes.times.length;
                if (jump_time > video_info.keyframes.times[r - 1]) {
                    l = r - 1;
                } else {
                    while (l < r) {
                        var m = (((l + r) / 2) | 0);
                        if (video_info.keyframes.times[m] > jump_time) {
                            r = m - 1;
                        } else if (video_info.keyframes.times[m] < jump_time) {
                            l = m + 1;
                        } else {
                            break;
                        }
                    }
                    if (video_info.keyframes.times[l] > jump_time) {
                        l--;
                    }
                }
                /*
                for(var l=video_info.keyframes.times.length-1; l>=0; l--){
                    if(video_info.keyframes.times[l] <= jump_time){break;}
                }
                */
                jump_time = ((video_info.keyframes.times[l]) | 0);
                nico.player.__set__playheadTime(jump_time);
                if (playing_flag) {
                    setCheckPlayingInterval();
                }
            } else if (video_info.seekpoints.length > 0) {
                //二分探索でシーク位置を決定
                var l = 0;
                var r = video_info.seekpoints.length;
                if (jump_time > video_info.seekpoints[r - 1].time) {
                    l = r - 1;
                } else {
                    while (l < r) {
                        var m = (((l + r) / 2) | 0);
                        if (video_info.seekpoints[m].time > jump_time) {
                            r = m - 1;
                        } else if (video_info.seekpoints[m].time < jump_time) {
                            l = m + 1;
                        } else {
                            break;
                        }
                    }
                    if (video_info.seekpoints[l].time > jump_time) {
                        l--;
                    }
                }
                /*
                for(var l=video_info.seekpoints.length-1; l>=0; l--){
                    if(video_info.seekpoints[l].time <= jump_time){break;}
                }
                */
                jump_time = Math.ceil(video_info.seekpoints[l].time);
                nico.player.__set__playheadTime(jump_time);
                if (playing_flag) {
                    setCheckPlayingInterval();
                }
            } else if (movie_type == 'flv' && force_seek) {
                checkSeek(now, 'backward');
            } else {
                nico.player.__set__playheadTime(jump_time);
                if (playing_flag) {
                    setCheckPlayingInterval();
                }
            }
        }
    }
}
//入力部透明化時、一定時間操作が無ければ入力部を非表示にする
//onMouseMoveのほかにはonKeyDownやonMouseWheelでも監視している
var hideUI_id;
var hideUI_flag = false;
var hideMouse_id;
var force_hideUI = false;
var ex_cm = false;
onMouseMove = function() {
    // マーキー表示時はヘッダが表示されててもバーを隠してる
    if (nico.isLargeScreen && (timed_hide_header || timed_hide_inputarea || (design_mode != 0 && !hide_header))) {
        showMouse();
        hideMouse_id = setTimeout(hideMouse, 2000);
        // UI変更に付きHeaderとMain_barの両方で判定
        if (!force_hideUI) {
            if (((timed_hide_header || (design_mode != 0 && !hide_header)) && _ymouse <= header._y + header._height) || ((timed_hide_header || (design_mode != 0 && !hide_header)) && _ymouse <= main_bar._y + main_bar._height) || (timed_hide_inputarea && _ymouse >= nico.controller._y)) {
                //trace("x:"+_xmouse +" y:"+_ymouse);
                //trace("main_bar._y"+main_bar._y +"main_barheight"+ main_bar._height);
                showUI();
            } else {
                if (!hideUI_flag && hideUI_id == undefined) {
                    setHideUITimer();
                }
            }
        }
    }
};
function setHideUITimer() {
    if (nico.isLargeScreen) {
        if (timed_hide_timelimit <= 0) {
            setTimeout(hideUI, 0);
        } else {
            showMouse();
            hideMouse_id = setTimeout(hideMouse, 2000);
            showUI();
            hideUI_id = setTimeout(hideUI, timed_hide_timelimit * 1000);
        }
    }
}
function hideMouse() {
    hideMouse_id = undefined;
    if (nico.isLargeScreen) {
        if (! (((timed_hide_header || (design_mode != 0 && !hide_header)) && _ymouse <= header._y + header._height) || ((timed_hide_header || (design_mode != 0 && !hide_header)) && _ymouse <= main_bar._y + main_bar._height) || (timed_hide_inputarea && _ymouse >= nico.controller._y))) {
            Mouse.hide();
            if (hideUI_id == undefined) hideUI_id = setTimeout(hideUI, timed_hide_timelimit * 1000);
        }
    }
}
function showMouse() {
    if (hideMouse_id != undefined) {
        clearInterval(hideMouse_id);
    }
    if (nico.isLargeScreen) {
        Mouse.show();
    }
}
function hideUI() {
    if (hideUI_id != undefined) {
        clearInterval(hideUI_id);
    }
    hideUI_id = undefined;
    if (nico.isLargeScreen && !hideUI_flag) {
        hideUI_flag = true;
        if (timed_hide_header && header._visible) {
            header._visible = false;
            main_bar._visible = false;
            flv_booster._visible = false;
            if (!ex_cm) nico.header._visible = false;
            nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y = 0;
        }
        // マーキー表示でヘッダありの時、main_barだけ隠す
        if (!hide_header && main_bar._visible && design_mode != 0) {
            main_bar._visible = false;
        }
        var w = Stage.width;
        var h = Stage.height - nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y - nico.player.INPUTAREA_LARGE_HEIGHT;
        if (timed_hide_inputarea && nico.controller._visible && !push_out_inputarea) {
            nico.controller._visible = false;
            nico.inputArea._visible = false;
            loglist_menu.add_id._visible = false;
            h = Stage.height - nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y;
        } else if (timed_hide_inputarea && nico.inputArea._visible && !push_out_inputarea) {
            nico.controller._visible = false;
            nico.inputArea._visible = false;
            loglist_menu.add_id._visible = false;
            h = Stage.height - nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y;
        }
        if ((timed_hide_header && !hide_header && !transparent_header) || (timed_hide_inputarea && !push_out_inputarea && !transparent_inputarea)) {
            var r = Math.min(w / nico.player.VIDEOWINDOW_DEFAULT_WIDTH, h / nico.player.VIDEOWINDOW_DEFAULT_HEIGHT);
            nico.player._mc._xscale = r * 100;
            nico.player._mc._yscale = r * 100;
            nico.player._mc._y = nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y;
            nico.player._mc._x = 10 * r + (w - Math.ceil(nico.player.VIDEOWINDOW_DEFAULT_WIDTH * r)) / 2;
        }
    }
}
function showUI() {
    if (hideUI_id != undefined) {
        clearInterval(hideUI_id);
    }
    hideUI_id = undefined;
    if (nico.isLargeScreen) {
        if (hideUI_flag) {
            hideUI_flag = false;
            ex_cm = false;
            if (!hide_header) {
                header._visible = true;
                main_bar._visible = (!autopop_mode || design_mode != 0);
                flv_booster._visible = true;
                nico.header._visible = design.nico_header.mode[design_mode] || autopop_mode;
                if (!transparent_header) {
                    nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y = 58;
                }
            }
            var w = Stage.width;
            var h = Stage.height - nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y - nico.player.INPUTAREA_LARGE_HEIGHT;
            if (!nico.controller._visible) {
                nico.controller._visible = true;
                nico.inputArea._visible = true;
                nico.inputArea._y = Stage.height - nico.inputArea._height - 10;
                if (cand_ng_id.length > 0) {
                    loglist_menu.add_id._visible = true;
                }
                if (transparent_inputarea) {
                    h = Stage.height - nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y;
                }
            }
            if ((timed_hide_header && !hide_header && !transparent_header) || (timed_hide_inputarea && !push_out_inputarea && !transparent_inputarea)) {
                var r = Math.min(w / nico.player.VIDEOWINDOW_DEFAULT_WIDTH, h / nico.player.VIDEOWINDOW_DEFAULT_HEIGHT);
                nico.player._mc._xscale = r * 100;
                nico.player._mc._yscale = r * 100;
                nico.player._mc._y = nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y;
                nico.player._mc._x = 10 * r + (w - Math.ceil(nico.player.VIDEOWINDOW_DEFAULT_WIDTH * r)) / 2;
            }
        }
    }
}
//flvplayerのfunctionを上書きしたり、addListenerしたり
//めんどうなのでほとんどコピペしてインデントなし
//どうせflvplayerが更新されたら変更しないとだめだし・・・

function replaceFunction() {
    /*//過去ログのところ
    nico.tabmenu.wayback_menu.wayback_btn.onRelease = function() {
      if (nico.premiumNo != 1) {
        nico.tabmenu.wayback_menu.wayback_btn.enabled = true;
        nico.tabmenu.wayback_menu.not_wayback._visible = false;
      }
      var v1 = nico.tabmenu.wayback_menu;
      v1.dateError_label._visible = false;
      nico.WaybackKey = new Object();
      nico.wayback_time = nico.wayback_date + v1.wayback_hour.value * 60 * 60 + v1.wayback_min.value * 60;
      if (nico.WaybackKey[nico.CurrentThreadID]) {
        if (!nico.NicosThreadID || nico.WaybackKey[nico.NicosThreadID]) {
          nico.getWaybackThread();
        } else {
          nico.getWaybackKey(nico.NicosThreadID);
        }
      } else {
        nico.getWaybackKey(nico.CurrentThreadID, true);
      }
    };
*/
    //オススメタブのxml受信処理
    nico.getRelation_xml._onLoad = nico.getRelation_xml.onLoad;
    nico.getRelation_xml.onLoad = function(success) {
        nico.getRelation_xml._onLoad(success);
        var status = nico.getRelation_xml.firstChild.attributes.status;
        if (status == 'ok') {
            for (var i = 0, l = nico.relationDP.length; i < l; i++) {
                var html = nico.relationDP[i].html;
                var a_index_start = html.indexOf('<a ');
                var link = "";
                if (a_index_start >= 0) {
                    var a_len = html.indexOf('>', a_index_start) + 1 - a_index_start;
                    link = html.substr(a_index_start, a_len);
                    if (auto_link_blank) {
                        link = link.slice(0, -1) + ' target="_blank">';
                    }
                    var a_index_end = html.indexOf('</a>', a_index_start);
                    if (useswfversion >= 7) {
                        var img_index_start = html.indexOf('<img ');
                        var img_index_end = html.indexOf('>', img_index_start) + 1;
                        html = html.substring(0, img_index_start) + link + html.substring(img_index_start, img_index_end) + "</a>" + html.substring(img_index_end, a_index_start) + link + html.substr(a_index_start + a_len);
                    } else {
                        html = link + html.substring(0, a_index_start) + html.substring(a_index_start + a_len, a_index_end) + html.substr(a_index_end + 4) + '</a>';
                    }
                    nico.relationDP[i].html = html;
                }
            }
            /*
            if (nico.selectTab != nico.TAB_RELATION) {
                       if (nico.hasRelation && !forbid_relation){
                                nico.updateTab(nico.tabmenu.relation_tab);
                           } // end if
            }
*/
        }
    };
    //ニコスクリプトでジャンプする処理
    /*nico.jumpVideoWithParams = function(id, params, target) {
        if(auto_link_blank){
            target = '_blank';
        }
        getURL('watch/' + id + nico.toQueryString(params), target);
    };*/
    nico.jumper._jump = nico.jumper.jump;
    nico.jumper.jump = function(id, params, obj, new_window) {
        if (auto_link_blank) {
            new_window = true;
        }
        nico.jumper._jump(id, params, obj, new_window);
    };
    //コメント受信時にアクティブにするタブを変更
    if (change_maintab && !e && !owner_thread_edit_mode) {
        nico.mainTab = nico.tabmenu.system_tab;
        if (nico.thread_type == 0) {
            nico.thread_type = nico.THREAD_LOG;
        }
    }
    //スクリーン上のコメントクリック用
    bg.hitArea = nico.videowindow;
    bg.onPress = function() {
        //ダブルクリック判定
        if (getTimer() - prev_click < 300 && double_click_fullscreen) {
            if (!nico.isLargeScreen) { //最大化状態でない
                nico.controller.controller_submenu.LargeScreenButton.onRelease();
            } else {
                nico.controller.controller_submenu.NormalScreenButton.onRelease();
            }
        } else {
            //シングルクリック
            //IEではホイールクリックでもonPressが実行されるため、左クリックのみを判定
            if (Key.isDown(1)) {
                if (use_swf_version >= 8 && key_operation && click_ime_off) {
                    System.IME.setEnabled(false); // IMEをオフにする
                }
                if (!owner_thread_edit_mode) {
                    if (nico.selectTab != nico.TAB_WAYBACK) {
                        var id = searchID();
                        emphID(id);
                        updateLogList("cand_ng_id");
                    }
                } else {
                    if (click_pause) {
                        nico.player.pause();
                    }
                }
            }
        }
        prev_click = getTimer();
        releaseFocus();
    };
    /*
フォーカスを外す→releaseFocus
・nico.videowindowにフォーカスできなくなっていたのでbgに変更。
*/
    // マウスがスクリーン上にあるかどうか判定する
    bg.onRollOver = function() {
        mouse_on_videowindow = true;
    };
    bg.onRollOut = function() {
        mouse_on_videowindow = false;
    };
    nico.controller.controller_submenu.OverlayOff.onRollOver = function() {
        mouse_on_overlay = true;
    };
    nico.controller.controller_submenu.OverlayOff.onRollOut = function() {
        mouse_on_overlay = false;
    };
    nico.controller.controller_submenu.OverlayOn.onRollOver = function() {
        mouse_on_overlay = true;
        //trace(mouse_on_overlay);
    };
    nico.controller.controller_submenu.OverlayOn.onRollOut = function() {
        mouse_on_overlay = false;
    };
    nico.videowindow.playButton.onRollOver = function() {
        mouse_on_playButton = true;
    };
    nico.videowindow.playButton.onRollOut = function() {
        mouse_on_playButton = false;
    };
    if (nico.coordinatesLayer) {
        nico.coordinatesLayer.onPress = bg.onPress;
    }
    //チャット送信ボタンのイベントリスナー処理
    nico.inputArea.ChatInput1._dispatchEvent = nico.inputArea.ChatInput1.dispatchEvent;
    nico.inputArea.ChatInput1.dispatchEvent = function(evt) {
        evt.target = this;
        if (evt.type == 'enter') {
            //チャット入力欄のEnterを殺す
            if (!kill_enter) {
                nico.inputArea.ChatSendButton.onRelease();
            } else {
                if (Key.isDown(17) && Key.isDown(13)) { //Ctrl+Enter
                    nico.inputArea.ChatSendButton.onRelease();
                }
            }
        } else {
            this._dispatchEvent(evt);
        }
    };
    /*nico.chatSendButtonListener.enter = function () {
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        if(!kill_enter){
          nico.inputArea.ChatSendButton.onRelease();
        }
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
    };*/
    //コメントの送信イベント
    nico.inputArea.ChatSendButton._onRelease = nico.inputArea.ChatSendButton.onRelease;
    nico.inputArea.ChatSendButton.onRelease = function() {
        if (!nico.inputArea.ChatSendButton._visible) {
            return undefined;
        }
        var v1 = nico.ChatInput.text;
        if (nico.sendMessage(v1, nico.inputArea.MailInput.text, nico.inputArea.NameInput.text, false)) {
            //kaki_txtに コメントした内容を追加する。
            if (apply_kakikomi) {
                var myDate = new Date();
                var addDate = myDate.getTime();
                if (!video_title) {
                    JS_getTitle();
                }
                var komeNo = parseInt(nico.last_resno);
                komeNo++; //コメ番号、完璧に最新ではない。
                kaki_txt.push({
                    video_id: video_id,
                    video_title: video_title,
                    date: addDate,
                    message_no: komeNo,
                    message: nico.ChatInput.text
                });
                kaki_txt_so.data.ids = kaki_txt;
                kaki_txt_so.flush();
                if (always_open_kakikomi_menu || kakikomi_menu._visible) {
                    updateKakikomiMenu("kaki_txt");
                }
            }
            nico.ChatInput.text = '';
        }
        nico.ChatInput.setFocus();
    };
    //コメント非表示ボタンの処理
    nico.controller.controller_submenu.OverlayOff._onRelease = nico.controller.controller_submenu.OverlayOff.onRelease;
    nico.controller.controller_submenu.OverlayOff.onRelease = function() {
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        //ログリストを隠す
        if (hide_log && nico.tabmenu.loglist_menu.LogList._visible) {
            nico.tabmenu.loglist_menu.LogList._visible = false;
        }
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        return nico.controller.controller_submenu.OverlayOff._onRelease();
    };
    //コメント表示ボタンの処理
    nico.controller.controller_submenu.OverlayOn._onRelease = nico.controller.controller_submenu.OverlayOn.onRelease;
    nico.controller.controller_submenu.OverlayOn.onRelease = function() {
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        //ログリストが隠れてたら戻す
        if (!nico.tabmenu.loglist_menu.LogList._visible) {
            nico.tabmenu.loglist_menu.LogList._visible = true;
        }
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        return nico.controller.controller_submenu.OverlayOn._onRelease();
    };
    //コマンド▲ボタンの機能を置き換える
    nico.inputArea.commandLabel.onRelease = function() {
        if (command_bar._visible) {
            command_bar._visible = false;
        } else {
            command_bar._visible = true;
            goTopDepth(command_bar);
        }
    };
    //入力可・不可の判定処理
    nico._UpdateChatInput = nico.UpdateChatInput;
    nico.UpdateChatInput = function() {
        nico._UpdateChatInput();
        //コマンド▲ボタンを表示する
        nico.inputArea.commandLabel._visible = true;
        //コメント投稿失敗時に入力部からフォーカスを外さないようにする
        nico.ChatInput = nico.inputArea.ChatInput1;
    };
    //動画の再生を開始する処理
    nico.OpenInput = function() {
        if (nico.ready) {
            if (nico.ChatInput._visible) {
                nico.inputArea.ChatSendButton._visible = true;
                if (nico.userButtonMessageSlots) {
                    nico.buttonMessagesEnabledCheck(nico.userButtonMessageSlots);
                }
                if (nico.buttonMessageSlots) {
                    nico.buttonMessagesEnabledCheck(nico.buttonMessageSlots);
                }
                if (nico.userButtonMessageSlots_community) {
                    nico.buttonMessagesEnabledCheck(nico.userButtonMessageSlots_community);
                }
            }
            return undefined;
        }
        nico.ready = true;
        nico.UpdateChatInput();
        nico.Overlay._visible = nico.OverlayFlag;
        if (e) {
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            nico.DeleteLabel._y -= 30;
            nico.DeleteButton._y -= 30;
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            nico.DeleteLabel._visible = true;
            nico.DeleteButton._visible = true;
            nico.controller.controller_submenu.NormalScreenButton._visible = false;
            nico.controller.controller_submenu.LargeScreenButton._visible = false;
        }
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        //最初にログリストを隠す
        if (hide_comment) {
            nico.controller.controller_submenu.OverlayOff.onRelease();
        }
        //playingになるまで読み込み画像が消えないので消す
        nico.videowindow.loadingImage._visible = false;
        //trace(nico.autoPlayPremium); チェックしてれば一般でも1が返る
        /*
        if(auto_play){
            //ボタンを押した事にして再生
            nico.autoPlayPremium = true;//trueでないと@cm動画で自動再生のフラグがたたない
            nico.autoPlay_so.data.flag = true;
            nico.videowindow.playButton.onRelease();
        }else{//公式の方に投げる

        }
        */
        if (auto_play) { //再生時最大化の挙動の都合
            if (nico.hasAtBGM || nico.hasAtCM) {
                if (nico.isInitBGM) {
                    nico.videowindow.playButton.onRelease();
                }
            } else {
                nico.videowindow.playButton.onRelease();
            }
        } else {
            nico.player.play();
        }
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
    };
    //動画上のメッセージを更新する処理
    nico.UpdateMessages = function(vpos, slot, msgs, noHide) {
        if (nico.isAtPauseNow && msgs != nico.Messages_ownerthread) {
            return undefined;
        }
        if (!nico.Overlay._visible) {
            return undefined;
        }
        if (!noHide) {
            var v2 = 0;
            while (v2 < slot.length) {
                var v3 = slot[v2];
                if (v3._message == undefined) {} else {
                    if (vpos <= v3._vstart || vpos >= v3._vend) {
                        nico.HideMessage(v3, slot);
                    }
                }++v2;
            }
            var v5;
            if (slot == nico.MessageSlots) {
                v5 = nico.userButtonMessageSlots;
            } else {
                if (slot == nico.MessageSlots_community) {
                    v5 = nico.userButtonMessageSlots_community;
                } else {
                    v5 = nico.buttonMessageSlots;
                }
            }
            //        var v5 = (slot == nico.MessageSlots) ? nico.userButtonMessageSlots : nico.buttonMessageSlots;
            v2 = 0;
            while (v2 < v5.length) {
                v3 = v5[v2];
                if (v3._message == undefined) {} else {
                    if (vpos <= v3._vstart || vpos >= v3._vend) {
                        nico.HideMessage(v3, v5);
                    }
                }++v2;
            }
        }
        v2 = 0;
        while (v2 < msgs.length) {
            v3 = msgs[v2];
            if (vpos >= v3._vstart && vpos <= v3._vend) {
                if (msgs[v2]._deleted == 0) {
                    nico.ShowMessage(v3, msgs);
                    //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                    var ms = slot[v3._slot];
                    // コメントの透明度を指定
                    if (transparent_comment) {
                        ms._mc._alpha = 100 - comment_alpha;
                    }
                    // 動画上のコメントにIDを表示
                    if (add_id_overlay) {
                        var mes = "[" + v3._user.substr(0, id_length) + "] " + v3._message;
                        if (v3.premium) {
                            mes = "P" + mes;
                        }
                        ms._mc.text = mes;
                    }
                    // コメント中のurlを探す
                    var flags;
                    if (msgs == nico.Messages) {
                        flags = link_searched;
                    } else if (msgs == nico.Messages_Nicos) {
                        flags = link_searched_nicos;
                    } else if (msgs == nico.Messages_ownerthread) {
                        flags = link_searched_ownerthread;
                    }
                    if (auto_link && flags[v2] != true && v3._message != undefined && links.length <= max_auto_link - 1) {
                        flags[v2] = true;
                        var cand_links = searchMessage(v3._message);
                        if (cand_links != undefined) {
                            addLink(cand_links);
                        }
                    }
                    //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
                }
            }++v2;
        }
    };
    //ヘッダ情報用のTextFormatを取得・設定
    //counter_fmt = nico.header.Members.getTextFormat();
    header.Members.setNewTextFormat(counter_fmt);
    header.MyLists.setNewTextFormat(counter_fmt);
    header.Comments.setNewTextFormat(counter_fmt);
    //ヘッダに再生数・マイリスト数を表示
    header.Members.text = "0";
    nico.Connection.onCMsgViewCounter = function(video, id, mylistCount) {
        //nico.header.Members.setNewTextFormat(counter_fmt);
        nico.header.Members.text = nico.comma_separated(video);
        //nico.header.MyLists.setNewTextFormat(counter_fmt);
        nico.header.MyLists.text = nico.comma_separated(int(mylistCount));
        //header.Members.setNewTextFormat(counter_fmt);
        header.Members.text = nico.comma_separated(video);
        //header.MyLists.setNewTextFormat(counter_fmt);
        header.MyLists.text = nico.comma_separated(int(mylistCount));
    };
    //ヘッダにコメント数を表示
    header.Comments.text = "0";
    nico.Connection._onCMsgGetThreadResult = nico.Connection.onCMsgGetThreadResult;
    nico.Connection.onCMsgGetThreadResult = function(resultcode, thread_id, tmp_last_res, ticket, message, locked, revision, offset, fork, newServerTime, ButtonIgnored, clickRev) {
        nico.Connection._onCMsgGetThreadResult(resultcode, thread_id, tmp_last_res, ticket, message, locked, revision, offset, fork, newServerTime, ButtonIgnored, clickRev);
        if (resultcode == 0) { //定数。元はNiwavidePacket.THREAD_FOUND
            var v1 = fork == 1; //定数。元はNiwavidePacket.FORK_OWNER
            if (!v1) {
                //header.Comments.setNewTextFormat(counter_fmt);
                //header.Comments.htmlText = '<b>' + nico.comma_separated(int(tmp_last_res) + int(offset)) + '</b>';
                //if (ButtonIgnored) {
                //  header.Comments.htmlText += ' <b><u><a href=\'http://help.nicovideo.jp/cat21/post_16.html#comment_number\'>※</a></u></b>';
                //}
                if (!nico.CommunityThreadID) {
                    header.Comments.text = nico.comma_separated(nico.last_resno + int(offset));
                } else {
                    header.Comments.text = nico.comma_separated(nico.last_resno_community + int(offset));
                }
            }
            if (nico.hasAtCM && !hide_icon_cm) {
                header.icon_cm._visible = true;
                header.icon_cm.onRelease = function() {
                    getURL("http://www.nicovideo.jp/static/script/27.html", "_blank");
                    nico.playerPause(true);
                };
            }
            header.icon_hiroba.onRelease = function() {
                if (nico.startedVideo) {
                    if (nico.hirobaIsReady && !nico.marqueePlayer.nowMarqueePause) {
                        if (nico.hirobaMode) {
                            nico.hirobaBackButton.onRelease();
                        } else {
                            emphID(-1);
                            loglist_menu.add_id._visible = false;
                            loglist_menu.cand_ng_id_list._visible = false;
                            nico.hirobaButton.onRelease();
                        }
                    }
                };
            };
            if (int(tmp_last_res) >= int(button_threshold) && nico.premiumNo == 1) {
                header.icon_buttonok._visible = true;
                header.icon_buttonok.onRelease = function() {
                    getURL("http://www.nicovideo.jp/static/script/22.html", "_blank");
                    nico.playerPause(true);
                };
            }
        }
    };
    //ヘッダにマイリスト数を表示
    //header.MyLists.setNewTextFormat(counter_fmt);
    header.MyLists.text = nico.comma_separated(int(mylist_counter));
    //時計用のTextFormatを取得・設定
    clock_fmt = nico.header.movieInfoBar.clock.clockText.getTextFormat();
    header.clock.clockText.setNewTextFormat(clock_fmt);
    //ヘッダに時計を表示
    nico._updateClock = nico.updateClock;
    nico.updateClock = function() {
        nico._updateClock();
        //swfの解像度を取得
        if (clock_info.movie_type != "" && nico.isShiSwfPlayer()) {
            if (nico.video_base_video._width != undefined && nico.video_base_video._height != undefined) {
                clock_info.movie_resolution = Math.round(nico.video_base_video._width) + "x" + Math.round(nico.video_base_video._height);
            }
        }
        //header.clock.clockText.setNewTextFormat(clock_fmt);
        showClockInfo(clock_mode);
    };
    setInterval(nico.updateClock, 500);
    //最大化処理
    nico.controller.controller_submenu.LargeScreenButton._onRelease = nico.controller.controller_submenu.LargeScreenButton.onRelease;
    nico.controller.controller_submenu.LargeScreenButton.onRelease = function() {
        // 過去ログのボタン
        if (hide_bar.wayback_tab_reg._visible) hide_bar.wayback_tab_reg._visible = false;
        //ヘッダーを隠す
        if (hide_header) {
            nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y = 0;
            main_bar._visible = false;
            header._visible = false;
            nico.header._visible = false;
        } else {
            nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y = 58;
        }
        nico.controller.controller_submenu.LargeScreenButton._onRelease();
        var javascript = "";
        if (push_out_inputarea) {
            //再生ボタンを反転させた状態ではnico.controller._heightがおかしくなるので数値で計算
            javascript += "$('flvplayer').setStyle({ height: document.documentElement.clientHeight + " + 52.75 + " + " + nico.inputArea._height + " + 'px' });" + "$('flvplayer_container').style.height = document.body.style.height = $('flvplayer').style.height.replace(/px$/i, '') + 'px';";
        }
        if (javascript != "") {
            doJavaScript(javascript);
        }
        if (transparent_header) {
            header._alpha = 100 - inputarea_alpha;
            main_bar._alpha = 100 - inputarea_alpha;
            flv_booster._alpha = 100 - inputarea_alpha;
            nico.header._alpha = 100 - cm_inputarea_alpha;
            // nico.headerを動画の前にする
            if (nico.videowindow.getDepth() > nico.header.getDepth()) {
                nico.videowindow.swapDepths(nico.header);
            }
        } else if (design_mode != 0) {
            main_bar._alpha = 100 - inputarea_alpha;
        }
        if (transparent_inputarea) {
            //nico.inputArea._alphaは透過度100なら真っ白
            //隠す処理とは関係ない。
            /*          if(nico.inputArea._y != -100 || !timed_hide_inputarea || timed_hide_timelimit != 0){
              nico.inputArea._y = Stage.height - nico.inputArea._height - 10;
            }
*/
            nico.inputArea._alpha = 100 - inputarea_alpha;
            nico.controller._alpha = 100 - inputarea_alpha;
            loglist_menu._alpha = 100 - inputarea_alpha;
        }
        // マーキー表示時でヘッダ表示なら自動で隠れるバーがある
        if (timed_hide_header || timed_hide_inputarea || (design_mode != 0 && !hide_header)) {
            setHideUITimer();
            //マーキー表示中の最大化
            setTimeout(function() {
                if (nico.isLargeScreen) if (autopop_mode) ex_cm = true;
            },
            250);
            /*
            //CM中に最大化したとき
            if (autopop_mode) {
                hideUI();
                hideMouse();
                autopop_mode = false;
                Show_marquee();
            }else{
                setHideUITimer();
            }
            */
            /*
             if(!autopop_mode){
                    setTimeout(function(){
                        if(autopop_mode){
                            setTimeout(function(){
                                if(nico.isLargeScreen){
                                    nico.header._visible = true;
                                    main_bar._visible = false;
                                }
                            },(timed_hide_timelimit_so.data.value * 1000)+500);
                        }
                    },500);
            }else{
                setTimeout(function(){
                    nico.header._visible = true;
                    main_bar._visible = false;
                },(timed_hide_timelimit_so.data.value * 1000)+500);
            }
            */
        }
        command_bar._visible = false;
        hide_bar._visible = false;
        bottom_line._visible = false;
        loglist_menu.tab._visible = false;
        loglist_menu.normal_list._visible = false;
        loglist_menu.cand_ng_id_list._visible = false;
        flv_booster._visible = header._visible;
        nico.header.marquee_base._y -= (design.nico_header.y[design_mode] + 3);
        nico.header.bgm_marquee_base._y = nico.header.marquee_base._y;
        main_bar._x = nico.header._x + design.large_bar.x[design_mode];
        main_bar._y = nico.header._y + design.large_bar.y[design_mode] + 100;
        header._x = nico.header._x + 550;
        header._y = nico.header._y - 2 + 100;
        flv_booster._x = header._x + 143;
        flv_booster._y = header._y - 3;
        // シークバーを動画の前にする
        if (nico.videowindow.getDepth() > nico.controller.getDepth()) {
            nico.videowindow.swapDepths(nico.controller);
        }
    };
    //最大化から元に戻す処理
    nico.controller.controller_submenu.NormalScreenButton._onRelease = nico.controller.controller_submenu.NormalScreenButton.onRelease;
    nico.controller.controller_submenu.NormalScreenButton.onRelease = function() {
        showMouse();
        showUI();
        nico.controller.controller_submenu.NormalScreenButton._onRelease();
        main_bar._visible = true;
        header._visible = true;
        nico.header._visible = design.nico_header.mode[design_mode];
        nico.header.marquee_base._y += (design.nico_header.y[design_mode] + 3);
        nico.header.bgm_marquee_base._y = nico.header.marquee_base._y;
        header._x = nico.header._x + 550;
        header._y = nico.header._y - 3 + 100;
        main_bar._x = nico.header._x + design.normal_bar.x[design_mode];
        main_bar._y = nico.header._y + design.normal_bar.y[design_mode] + 100;
        flv_booster._x = header._x + 143;
        flv_booster._y = header._y - 3;
        bg._x = nico.videowindow._x;
        bg._y = nico.videowindow._y;
        bg._width = 30;
        bg._height = 30;
        //bg._visible = false;
        header._alpha = 100;
        nico.header._alpha = 100;
        main_bar._alpha = 100;
        flv_booster._alpha = 100;
        nico.controller._alpha = 100;
        nico.inputArea._alpha = 100;
        loglist_menu._alpha = 100;
        command_bar._x = 3;
        command_bar._y = command_bar_default_y;
        if (large_stage) {
            command_bar._visible = true;
            hide_bar._visible = true;
        }
        bottom_line._visible = true;
        if (list_mode == "cand_ng_id") {
            loglist_menu.tab._visible = true;
            loglist_menu.normal_list._visible = true;
        } else if (cand_ng_id.length > 0) {
            loglist_menu.cand_ng_id_list._visible = true;
        }
        loglist_menu.add_id._x = 309;
        loglist_menu.add_id._y = 2;
        flv_booster._visible = true;
        // シークバーは動画のうしろに
        if (nico.videowindow.getDepth() < nico.header.getDepth()) {
            nico.videowindow.swapDepths(nico.header);
        }
        if (nico.videowindow.getDepth() < nico.controller.getDepth()) {
            nico.videowindow.swapDepths(nico.controller);
        }
        // マーキー表示中なら表示
        if (autopop_mode) {
            autopop_mode = false;
            Show_marquee();
        }
        //マーキー表示中の最大化例外処置を戻す
        ex_cm = false;
        //過去ログタブを選んでたらボタンを表示
        if (nico.selectTab == nico.TAB_WAYBACK) {
            hide_bar.wayback_tab_reg._visible = true;
        }
    };
    //リサイズ時の処理
    nico.stageListener.onResize = function() {
        //screen.wrapper_info._xscale = nico.videowindow._xscale;
        //screen.wrapper_info._yscale = nico.videowindow._yscale;
        if (Stage.height > 300 && Stage.width > 700) {
            if (nico.isLargeScreen) {
                nico.videowindow._x = 0;
                if (nico.controller._visible) {
                    nico.inputArea._visible = true;
                }
                nico.header._x = Stage.width / 2 - nico.header._width / 2;
                nico.inputArea._x = Stage.width / 2 - nico.inputArea._width / 2;
                //timed_hide_timelimit == 0のとき、nico.inputAreaが残る問題を解決
                //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                if (nico.inputArea._y != -100 || !timed_hide_inputarea || timed_hide_timelimit != 0) {
                    nico.inputArea._y = Stage.height - nico.inputArea._height - 10;
                }
                //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
                nico.CommandMenu._x = nico.inputArea._x;
                nico.CommandMenu._y = nico.inputArea._y - nico.CommandMenu._height - 10;
                nico.player.setLsize(true);
                //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                if (change_bgcolor) {
                    bg._x = 0;
                    bg._y = 0;
                    bg._width = Stage.width;
                    bg._height = Stage.height;
                    //bg._visible = true;
                } else {
                    bg._x = nico.videowindow._x;
                    bg._y = nico.videowindow._y;
                    bg._width = 30;
                    bg._height = 30;
                }
                //最大化時のレイアウトを再設定
                if (transparent_header) {
                    nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y = 0;
                }
                var w = Stage.width;
                var h;
                if (transparent_inputarea) {
                    h = Stage.height - nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y;
                } else {
                    h = Stage.height - nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y - nico.player.INPUTAREA_LARGE_HEIGHT;
                }
                var r = Math.min(w / nico.player.VIDEOWINDOW_DEFAULT_WIDTH, h / nico.player.VIDEOWINDOW_DEFAULT_HEIGHT);
                nico.player._mc._xscale = r * 100;
                nico.player._mc._yscale = r * 100;
                nico.player._mc._y = nico.player.VIDEOWINDOW_LARGE_DEFAULT_Y;
                //videowindowのx座標を真中に変更
                //nico.player._mc._x = 10 * r + (w - Math.ceil(nico.player.VIDEOWINDOW_DEFAULT_WIDTH * r)) / 2;
                nico.player._mc._x = (w - Math.ceil(nico.player.VIDEOWINDOW_DEFAULT_WIDTH * r)) / 2;
                //再生ボタンを反転させた状態ではnico.controller._heightがおかしくなるので数値で計算し直す
                nico.controller._y = Stage.height - 52.75 * 1.7;
                loglist_menu.add_id._x = -loglist_menu._x + 67;
                loglist_menu.add_id._y = nico.inputArea._y - loglist_menu._y + 24;
                command_bar._x = Stage.width / 2 - command_bar._width / 2;
                command_bar._y = nico.controller._y - command_bar._height - 3;
            }
            // なんだか最大化時にバーがはみ出す動画があるのでとりあえず
            // どうやら@CMにNMM以外で作ったFlashを上げると一部そうなるらしい
            // nicoplayerでもおかしくなるから、近いうちに公式でこの辺の修正はいるかも
            if (nico.header._x < 0) {
                nico.header._x = Stage.width / 2 - 940 / 2;
            }
            main_bar._x = nico.header._x + design.large_bar.x[design_mode];
            header._x = nico.header._x + 550;
            flv_booster._x = header._x + 143;
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        } else {
            if (nico.isLargeScreen) {
                nico.inputArea._visible = false;
            }
        }
    };
    //ログリストのタブ切り替えの処理
    nico._updateTab = nico.updateTab;
    nico.updateTab = function(tab) {
        nico._updateTab(tab);
        loglist_menu._visible = nico.tabmenu.loglist_tab._currentframe == nico.TAB_SELECT;
        // 「再生に合わせてスクロール」使用時、過去ログのログリストが更新されない問題に対処
        if (nico.isPlayScroll && tab == nico.tabmenu.wayback_tab) {
            nico.tabmenu.wayback_menu.LogList_Wb.updateControl();
            //nico.tabmenu.wayback_menu.LogList_Wb.dataProvider.updateViews();
            nico.tabmenu.wayback_menu.LogList_Wb_Nicos.updateControl();
            //nico.tabmenu.wayback_menu.LogList_Wb_Nicos.dataProvider.updateViews();
        }
        if (tab == nico.tabmenu.wayback_tab) {
            hide_bar.wayback_tab_reg._visible = true;
        } else {
            hide_bar.wayback_tab_reg._visible = false;
        }
    };
    //playscrollの場合、ソートカラムの初期値を再生時間にする
    if (nico.isPlayScroll) {
        loglist_sorted_column = 'ptime';
    }
    //ログリストのイベントリスナー処理
    nico.LogList._dispatchEvent = nico.LogList.dispatchEvent;
    nico.LogList_menu.LogList_Nicos._dispatchEvent = nico.LogList_menu.LogList_Nicos.dispatchEvent;
    nico.tabmenu.wayback_menu.LogList_Wb._dispatchEvent = nico.tabmenu.wayback_menu.LogList_Wb.dispatchEvent;
    nico.tabmenu.wayback_menu.LogList_Wb_Nicos._dispatchEvent = nico.tabmenu.wayback_menu.LogList_Wb_Nicos.dispatchEvent;
    nico.LogList.dispatchEvent = function(evt) {
        evt.target = this;
        if (evt.type == 'headerRelease') {
            //ログリストのヘッダをクリックしたときの処理
            nico.LogListListener.headerRelease(evt);
            //ログリストのソートカラムを保存する
            loglist_sorted_column = evt.target.columnNames[evt.columnIndex];
        } else if (evt.type == 'change') {
            //ログリストのアイテムを選択したときの処理
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            //releaseFocus();
            var v1 = evt.target;
            if (v1.selectedItem != undefined) {
                if (list_mode == "normal") {
                    if (!e) {
                        loglist_menu.add_id._visible = true;
                    }
                    loglist_menu.cand_ng_id_list._visible = true;
                    emphID(v1.selectedItem.user);
                }
                var mes = v1.selectedItem.message;
                if (add_id) {
                    var index = mes.indexOf('] ');
                    if (index > 0) {
                        mes = mes.substr(index + 2);
                    }
                }
                var msgs;
                var flags;
                if (evt.target == nico.LogList || evt.target == nico.LogList_Wb) {
                    msgs = nico.Messages;
                    flags = link_searched;
                } else if (evt.target == nico.LogList_Nicos || evt.target == nico.LogList_Wb_Nicos) {
                    msgs = nico.Messages_Nicos;
                    flags = link_searched_nicos;
                } else if (evt.target == nico.LogList_ownerthread) {
                    msgs = nico.Messages_ownerthread;
                    flags = link_searched_ownerthread;
                }
                var no = nico.findMessage(v1.selectedItem.resno, msgs);
                if (auto_link && flags[no] != true && links.length <= max_auto_link - 1) {
                    flags[no] = true;
                    var cand_links = searchMessage(mes);
                    if (cand_links != undefined) {
                        addLink(cand_links);
                    }
                }
                if (copy_to_clip_board && copy_message_to_clip_board) {
                    System.setClipboard(v1.selectedItem.user + ' ' + mes);
                } else if (copy_to_clip_board) {
                    System.setClipboard(v1.selectedItem.user);
                } else if (copy_message_to_clip_board) {
                    System.setClipboard(mes);
                }
            } else {
                loglist_menu.add_id._visible = false;
                loglist_menu.cand_ng_id_list._visible = false;
            }
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            clearInterval(nico.clickIntervalId);
            nico.clickIntervalId = setInterval(nico.clickIntervalReset, nico.clickDuration);
            if (nico.clickIndex >= 0 && nico.clickIndex != v1.selectedIndex) {
                nico.clickNo = 0;
            }++nico.clickNo;
            if (nico.clickNo >= 2) {
                if (v1 === nico.hirobaMovieList) {
                    if (v1.selectedItem.isCC) {
                        getURL(nico.U + 'redir?p=' + v1.selectedItem.isCC, '_blank');
                    }
                } else {
                    nico.seekLogListSelect(v1);
                }
            }
            nico.clickIndex = v1.selectedIndex;
        } else {
            this._dispatchEvent(evt);
        }
    };
    nico.LogList_ownerthread.dispatchEvent = nico.LogList.dispatchEvent;
    nico.LogList_menu.LogList_Nicos.dispatchEvent = nico.LogList.dispatchEvent;
    nico.tabmenu.wayback_menu.LogList_Wb.dispatchEvent = nico.LogList.dispatchEvent;
    nico.tabmenu.wayback_menu.LogList_Wb_Nicos.dispatchEvent = nico.LogList.dispatchEvent;
    /*nico.LogListListener._headerRelease = nico.LogListListener.headerRelease;
    nico.LogListListener.headerRelease = function (evt) {
        nico.LogListListener._headerRelease(evt);
        loglist_sorted_column = evt.target.columnNames[evt.columnIndex];
    };*/
    /*nico.LogListListener.change = function (evt) {
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        releaseFocus();
      var v1 = evt.target;
      if (nico.LogList.selectedItem != undefined) {
        if(list_mode == "normal"){
            if(!e){
                loglist_menu.add_id._visible = true;
            }
            loglist_menu.cand_ng_id_list._visible = true;
            emphID(v1.selectedItem.user);
        }
        var mes = v1.selectedItem.message;
        if(add_id){
            var index = mes.indexOf('] ');
            if(index>0){mes = mes.substr(index + 2);}
        }
        if(copy_to_clip_board && copy_message_to_clip_board){System.setClipboard(v1.selectedItem.user + ' ' + mes);}
        else if(copy_to_clip_board){System.setClipboard(v1.selectedItem.user);}
        else if(copy_message_to_clip_board){System.setClipboard(mes);}
      } else {
        loglist_menu.add_id._visible = false;
        loglist_menu.cand_ng_id_list._visible = false;
      }
    //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
      clearInterval(nico.clickIntervalId);
      nico.clickIntervalId = setInterval(nico.clickIntervalReset, nico.clickDuration);
      if (nico.clickIndex >= 0 && nico.clickIndex != v1.selectedIndex) {
        nico.clickNo = 0;
      }
      ++nico.clickNo;
      if (nico.clickNo >= 2) {
        nico.seekLogListSelect(v1);
      }
      nico.clickIndex = v1.selectedIndex;
    };*/
    /*
    nico._ClearMessages_Community = nico.ClearMessages_Community;
    nico.ClearMessages_Community = function(){
        nico._ClearMessages_Community();

    };
    */
    //通常コメントをクリアする処理
    nico._ClearMessages = nico.ClearMessages;
    nico.ClearMessages = function() {
        nico._ClearMessages();
        //nico.Messagesがクリアされるので、fwMessages、cand_ng_id、フィルター関係のフラグとカウンタを初期化
        fwMessages = new Array();
        cand_ng_id = new Array();
        filter1_flag = new Array();
        filter1_count = 0;
        filter2_flag = new Array();
        filter2_count = 0;
        filter3_flag = new Array();
        filter3_count = 0;
        filter4_flag = new Array();
        filter4_count = 0;
        ngid_filter_flag = new Array();
        ngid_filter_count = 0;
        ngmessage_flag = new Array();
        ngmessage_count = 0;
        custom_filter_message_count = 0;
        ngid_filter_message_count = 0;
        link_searched = new Array();
    };
    //ニコスコメントをクリアする処理
    nico._ClearMessages_Nicos = nico.ClearMessages_Nicos;
    nico.ClearMessages_Nicos = function() {
        nico._ClearMessages_Nicos();
        //nico.Messages_Nicosがクリアされるので、fwMessages_Nicos、フラグを初期化
        fwMessages_Nicos = new Array();
        link_searched_nicos = new Array();
    };
    //投稿者コメント欄をクリアする処理
    nico._ClearMessages_ownerthread = nico.ClearMessages_ownerthread;
    nico.ClearMessages_ownerthread = function() {
        nico._ClearMessages_ownerthread();
        //nico.Messages_ownerthreadがクリアされるので、fwMessages_ownerthread、フラグを初期化
        fwMessages_ownerthread = new Array();
        link_searched_ownerthread = new Array();
    };
    //古いコメントを破棄するときの処理
    nico.shiftMessages = function(msgs, list, max) {
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        if (max < msgs.length) {
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            var v1 = msgs.shift();
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            //nico.Messages[0]が破棄されるとき、fwMessages、cand_ng_id、フィルター関係のフラグとカウンタも更新する
            if (msgs == nico.Messages) {
                for (var i = 0; i < fwMessages.length; i++) {
                    fwMessages[i].no--;
                    if (fwMessages[i].no < 0) {
                        fwMessages.splice(i, 1);
                        i--;
                    }
                }
                for (var i = 0; i < cand_ng_id.length; i++) {
                    cand_ng_id[i].no--;
                    if (cand_ng_id[i].no < 0) {
                        cand_ng_id.splice(i, 1);
                        i--;
                    }
                }
                if (filter1_flag.shift()) {
                    filter1_count--;
                }
                if (filter2_flag.shift()) {
                    filter2_count--;
                }
                if (filter3_flag.shift()) {
                    filter3_count--;
                }
                if (filter4_flag.shift()) {
                    filter4_count--;
                }
                if (ngid_filter_flag.shift()) {
                    ngid_filter_count--;
                }
                if (ngmessage_flag.shift()) {
                    ngmessage_count--;
                }
                if (custom_filter_message_count > 0) {
                    custom_filter_message_count--;
                }
                if (ngid_filter_message_count > 0) {
                    ngid_filter_message_count--;
                }
                link_searched.shift();
            } else if (msgs == nico.Messages_Nicos) {
                for (var i = 0; i < fwMessages_Nicos.length; i++) {
                    fwMessages_Nicos[i].no--;
                    if (fwMessages_Nicos[i].no < 0) {
                        fwMessages_Nicos.splice(i, 1);
                        i--;
                    }
                }
                link_searched_nicos.shift();
            } else if (msgs == nico.Messages_ownerthread) { //一応書いたが、今のところここに入ることは無い
                for (var i = 0; i < fwMessages_ownerthread.length; i++) {
                    fwMessages_ownerthread[i].no--;
                    if (fwMessages_ownerthread[i].no < 0) {
                        fwMessages_ownerthread.splice(i, 1);
                        i--;
                    }
                }
                link_searched_ownerthread.shift();
            }
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            if (has_owner_thread) {
                nico.deleteScriptMessage(v1, false);
            }
            list.removeItemAt(nico.findLogList(v1._no, list));
            nico.HideMessage(v1);
            return true;
        }
        return false;
    };
    //TubePlayerと併用するとnico.filteringMessageがなぜか効かなくなる
    //同じ機能を上書きするとなぜか効く
    nico.filteringMessage = function(msg) {
        var v4 = nico.filterListDP;
        var v1 = msg;
        var v7 = nico.inputArea.ChatInput1.maxChars;
        var v3 = 0;
        while (v3 < v4.length) {
            var v6 = v4[v3].dest;
            var v2 = v4[v3].source;
            var v5 = false;
            if (v2.charAt(0) == '*') {
                v2 = v2.substr(1);
                v5 = true;
            }
            //DebugOut(v1 + ' >>>> ' + v2);
            if (v1.indexOf(v2) >= 0) {
                if (v5) {
                    v1 = v6;
                } else {
                    v1 = nico.strReplace(v1, v4[v3].source, v6);
                }
                v1 = v1.substr(0, v7);
            }++v3;
        }
        return v1;
    };
    //メッセージを受け取った時の処理
    nico.Connection.onCMsgChat = function(message, thread, no, vpos, date, mail, name, yourpost, user, raw_user, deleted, premium, anonymity, fork) {
        var v4;
        if (fork == 1) { //定数。元はNiwavidePacket.FORK_OWNER
            v4 = 'game';
        } else {
            if (thread == nico.NicosThreadID) {
                v4 = 'nicos';
            } else {
                if (thread == nico.CommunityThreadID) {
                    v4 = 'community';
                } else {
                    v4 = 'current';
                }
            }
        }
        if (!nico.hasNiconiCM && v5 != 'game' && vpos > nico.player.totalTime * 100) {
            deleted = nico.MESSAGE_NICONICM_DELETE;
        }
        if (nico.MsgGetError > 0) {
            ++nico.NoNewMessagesStatus;
            ++nico.MsgGetStatus;
            nico.getThreadFinalization();
            return;
        }
        var isWayBack = nico.selectTab == nico.TAB_WAYBACK;
        if (v4 == 'nicos') {
            if (nico.first_resno_nicos == 0) {
                nico.first_resno_nicos = no;
                if (isWayBack) {
                    nico.setWaybackforWeb(nico.wayback_time);
                }
            }
        } else {
            if (v4 == 'community') {
                if (nico.first_resno_community == 0) {
                    nico.first_resno_community = no;
                    if (isWayBack) {
                        nico.setWaybackforWeb(nico.wayback_time);
                    }
                }
            } else {
                if (nico.first_resno == 0) {
                    nico.first_resno = no;
                    if (isWayBack && v4 != 'game') {
                        nico.setWaybackforWeb(nico.wayback_time);
                    }
                }
            }
        }
        if (nico.NoMessages && v4 == 'current') {
            nico.ClearMessages();
        }
        if (nico.NoMessages_Nicos && v4 == 'nicos') {
            nico.ClearMessages_Nicos();
        }
        if (nico.NoMessages_Community && v4 == 'community') {
            nico.ClearMessages_Community();
        }
        var v2;
        var v8;
        var v10;
        var v14;
        var v19;
        var v16;
        var v15;
        var v20;
        if (v4 == 'game') {
            v2 = nico.Messages_ownerthread;
            v8 = nico.MessageSlots_ownerthread;
            v14 = nico.LogListDP_ownerthread;
            v10 = nico.LogList_ownerthread;
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            v15 = resMax;
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            v16 = nico.last_resno;
        } else {
            if (v4 == 'nicos') {
                v2 = nico.Messages_Nicos;
                v8 = nico.MessageSlots;
                v14 = nico.LogListDP_Nicos;
                v19 = nico.LogList_Wb_Nicos;
                v10 = nico.LogList_Nicos;
                //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                v15 = resMax / 2;
                //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
                v16 = nico.last_resno_nicos;
                v20 = nico.deleteList_nicos;
                nico.NoMessages_Nicos = false;
            } else {
                if (v4 == 'community') {
                    v2 = nico.Messages_community;
                    v8 = nico.MessageSlots_community;
                    v14 = nico.LogListDP_community;
                    v19 = nico.LogList_Wb_community;
                    v10 = nico.LogList_community;
                    v15 = resMax;
                    v16 = nico.last_resno_community;
                    v20 = nico.deleteList;
                    nico.NoMessages_Community = false;
                    nico.loglist_len = nico.MAX_LOGLIST_COMMUNITY_LEN;
                } else {
                    v2 = nico.Messages;
                    v8 = nico.MessageSlots;
                    v14 = nico.LogListDP;
                    v19 = nico.LogList_Wb;
                    v10 = nico.LogList;
                    v15 = resMax;
                    v16 = nico.last_resno;
                    v20 = nico.deleteList;
                    nico.NoMessages = false;
                }
            }
        }
        if (message == undefined) {
            message = '';
        }
        vpos /= nico.VPOS_FACTOR;
        no = Number(no);
        date = Number(date);
        if (nico.MyPost == no) {
            yourpost = true;
            nico.MyPost = undefined;
        }
        var v9 = 0;
        var v13 = 0;
        var v1 = v2.length - 1;
        while (v1 >= 0) {
            var v6 = v2[v1];
            var v5 = v6._no;
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            //新着コメントはfwMessagesに盲目的にpushしていくので
            //今保持しているのコメントよりも古いコメントがきたら捨てる
            //502バグ？(502エラーになると前回取得したコメントXMLがまた送られてくる)の対処もかねる
            if (v5 >= no) {
                return undefined;
            }
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            if (v5 == no) {
                nico.HideMessage(v6, v8);
                v13 = 1;
                v9 = v1;
                break;
            }
            if (v5 < no) {
                v9 = v1 + 1;
                break;
            }--v1;
        }
        if (mail == undefined) {
            mail = '';
        }
        var v12 = nico.CreateMessage(thread, no, user, vpos, name, mail, message, yourpost, int(deleted), premium, v4 == 'game');
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        // trace("v12._message   " + v12._message);
        // trace("message   " + message);
        if (nico.o.ng_up != undefined) {
            //trace("フィルタがあるよ");
            if (hide_comment_with_filter) { //フィルタにかかるものを消す
                if (message !== v12._message) {
                    deleted = "1";
                }
            } else if (pass_through_message_filter) { //フィルタを透過
                v12._message = message;
                /* messageに変換前のコメントが入っている
               v12._messageは変換後のコメント*/
            } else { //フィルタを通常通り使用
                message = v12._message;
            }
        }
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        var v18 = false;
        if (deleted == nico.MESSAGE_MANAGE_DELETE || !e && deleted == nico.MESSAGE_NICONICM_DELETE || !e && deleted == nico.MESSAGE_USER_DELETE) {
            v18 = true;
        }
        if (has_owner_thread && !v18) {
            if (!nico.CommunityThreadID || !(v4 == 'current' || v4 == 'nicos')) {
                v12.timer = nico.getScriptTimer(mail);
                if (!nico.addScriptMessage(v12, v4 == 'game')) {
                    nico.isScriptError = true;
                }
            }
        }
        if (v4 != 'game' || !nico.isScript(message, v4 == 'game') || owner_thread_edit_mode || open_src) {
            if (!v18) {
                nico.newMessageLen[thread] = int(nico.newMessageLen[thread]) + 1;
                v2.splice(v9, v13, v12);
                //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                if (v4 == 'game') {
                    if (v12._user == undefined || v12._user == "") {
                        v12._user = "投稿者";
                    }
                    fwMessages_ownerthread.push({
                        no: nico.Messages_ownerthread.length - 1,
                        _no: v12._no,
                        user_id: v12._user,
                        raw_user: raw_user,
                        _message: v12._message,
                        _vpos: v12._vpos,
                        vpos: v12._vpos * nico.VPOS_FACTOR,
                        date: date,
                        premium: premium,
                        name: v12._name,
                        mail: v12._mail,
                        thread: thread,
                        _scriptError: v12._scriptError,
                        deleted: v12._deleted,
                        anonymity: anonymity
                    });
                    //投稿者コメントは編集時のためIDを表示しない
                    nico.AddChatLog(v14, v9, v13, v12._no, v12._user, v12._vpos, message, v12._mail, v12._name, date, deleted, v12._scriptError);
                } else if (v4 == 'nicos') {
                    if (v12._user == undefined || v12._user == "") {
                        v12._user = "試聴者";
                    }
                    fwMessages_Nicos.push({
                        no: nico.Messages_Nicos.length - 1,
                        _no: v12._no,
                        user_id: v12._user,
                        raw_user: raw_user,
                        _message: v12._message,
                        _vpos: v12._vpos,
                        vpos: v12._vpos * nico.VPOS_FACTOR,
                        date: date,
                        premium: premium,
                        name: v12._name,
                        mail: v12._mail,
                        thread: thread,
                        _scriptError: v12._scriptError,
                        deleted: v12._deleted,
                        anonymity: anonymity
                    });
                    if (add_id) {
                        message = "[" + v12._user.substr(0, id_length) + "] " + message;
                        if (premium) {
                            message = "P" + message;
                        }
                    }
                    nico.AddChatLog(v14, v9, v13, v12._no, v12._user, v12._vpos, message, v12._mail, v12._name, date, deleted, v12._scriptError);
                } else if (v4 == 'current') {
                    //コメントが０の場合、こいつが送られてきてnico.Messages[0]に鎮座する
                    //Connection.onCMsgChat(" コメントがない以下略", "", 0, 0, 0, "ue", "注意", 1);
                    if (v12._no != 0) { //↑のやつじゃなかったら
                        if (v12._user == undefined || v12._user == "") {
                            v12._user = "試聴者";
                        }
                        fwMessages.push({
                            no: nico.Messages.length - 1,
                            _no: v12._no,
                            user_id: v12._user,
                            raw_user: raw_user,
                            _message: v12._message,
                            _vpos: v12._vpos,
                            vpos: v12._vpos * nico.VPOS_FACTOR,
                            date: date,
                            premium: premium,
                            name: v12._name,
                            mail: v12._mail,
                            thread: thread,
                            _scriptError: v12._scriptError,
                            deleted: v12._deleted,
                            anonymity: anonymity
                        });
                        //通常のコメントは受信時ではなくupdateFilterでのチェック時にAddChatLogするようにした
                        //if(add_id){
                        //  message = "[" + v12._user.substr(0,id_length) + "] " + message;
                        //  if(premium){
                        //      message = "P" + message;
                        //  }
                        //}
                        //if(list_mode == "normal"){
                        //  nico.AddChatLog(v14, v9-filter_count, v13, v12._no, v12._user, v12._vpos, message, v12._mail, v12._name, date, deleted, v12._scriptError);
                        //}
                    }
                } else if (v4 == 'community') {
                    //fwMessages.push({no: nico.Messages_community.length - 1, _no: v12._no, user_id: v12._user, raw_user: raw_user, _message: v12._message, _vpos: v12._vpos, vpos: v12._vpos * nico.VPOS_FACTOR, date: date, premium: premium, name: v12._name, mail: v12._mail, thread: thread, _scriptError: v12._scriptError, deleted: v12._deleted, anonymity: anonymity});
                    nico.AddChatLog(v14, v9, v13, v12._no, v12._user, v12._vpos, message, v12._mail, v12._name, date, deleted, v12._scriptError);
                }
            }
        }
        if (resMax > 0 && v4 != 'game') {
            nico.shiftMessages(v2, v10, v15);
        }
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        if (int(v16) == int(no)) {
            if (v4 != 'game') {
                ++nico.MsgGetStatus;
            } else {
                nico.writeLogList_ownerthread();
                nico.ready_ownerthread = true;
                if (!owner_thread_edit_mode) {
                    nico.last_resno = 0;
                    nico.lastConnectBoard = function() {
                        nico.connectBoard(false, isWayBack);
                    };
                    nico.lastConnectBoard();
                } else {
                    nico.tabmenu.enabled = true;
                    nico.inputArea.enabled = true;
                    nico.OpenInput();
                }
            }
            var v22 = false;
            if (v4 == 'current' && is_community_thread) {
                v22 = true;
            }
            nico.writeLogList(v10, v14, v19, v20, v22);
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            //最新コメントはAddChatLogしなくなったので表示を更新しない
            if (v4 != 'current') {
                nico.writeLogList(v10, v14, v19, v20);
            }
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            if (has_owner_thread) {
                if (nico.adPlay) {
                    //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                    if (!disable_nicoscript) {
                        nico.addScriptLoad();
                    }
                    //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
                }
            }
            if (v4 != 'game') {
                if (nico.ng_menu.ngCheck.selected || nico.ng_menu.ng184.selected) {
                    var v3 = v2.length - nico.newMessageLen[thread];
                    while (v3 < v2.length) {
                        nico.NGMessage(v2, v8, v10, v3, true);
                        ++v3;
                    }
                    nico.ng_menu.ngList.dataProvider = nico.ngListDP;
                    nico.ngList_so.data.list = nico.ngListDP;
                    nico.ngList_so.flush();
                }
                nico.getThreadFinalization();
            } else {
                if (nico.adPlay) {
                    nico.initScript();
                }
            }
            nico.newMessageLen[thread] = 0;
            nico.isStandbyMessage = true;
        }
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        // 「再生に合わせてスクロール」使用時、過去ログのログリストが更新されない問題に対処
        if (nico.isPlayScroll && nico.selectTab == nico.TAB_WAYBACK) {
            nico.tabmenu.wayback_menu.LogList_Wb.dataProvider.updateViews();
            nico.tabmenu.wayback_menu.LogList_Wb_Nicos.dataProvider.updateViews();
        }
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
    };
    //動画URL等を得た後の処理
    nico.o.onLoad = function(success) {
        nico.Stats.getflv = getTimer() - nico.Stats.getflv;
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        var start_index = nico.o.url.indexOf('smile\?v=');
        if (start_index >= 0) {
            var tmp = nico.o.url.substr(start_index);
            tmp = tmp.substring(8, tmp.indexOf('.'));
            if (VIDEO.indexOf(tmp) != 2 || replaceSentence(VIDEO, tmp, '') != "sm") {
                video_id = 'sm' + tmp;
            } else {
                video_id = VIDEO;
            }
        } else {
            video_id = VIDEO;
        }
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        nico.UserID = nico.o.user_id;
        //nico.loadMarqueeXML();
        nico.ng_revision = nico.o.ng_rv;
        //if (nico.o.ng_up) ではなぜかダメだった
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        if (nico.o.ng_up != undefined) {
            var v2 = new LoadVars();
            v2.decode(nico.o.ng_up);
            for (var v7 in v2) {
                nico.filterListDP.push({
                    source: v7,
                    dest: v2[v7],
                    deleted: false
                });
                //          trace(v6 + ' -> ' + v1[v6]);
                nico.filter_menu.filterList.dataProvider = nico.filterListDP;
                nico.filter_menu.filterList.vPosition = nico.filterListDP.length;
                nico.filter_menu.lenText.text = nico.filterListDP.length + '/20';
            }
        }
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        nico.filter_ready = true;
        var v10 = new Date();
        nico.servertime = parseInt(nico.o.time + '000') - v10.getTime();
        //      trace('getflv時刻補正：' + (new Date(servertime)).getSeconds() + '秒');
        if (nico.o.url.substr(nico.o.url.length - 3, 3) == 'low') {
            nico.AddSystemMessage(nico.getSystemMessage('エコノミーモードで再生中です。'));
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            header.icon_narrow._visible = true;
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            nico.header.icon_narrow._visible = true;
            nico.header.icon_narrow.onRelease = function() {
                getURL('http://help.nicovideo.jp/cat21/post_40.html ', '_blank');
                nico.playerPause(true);
            };
        }
        if (nico.o.ce) {
            nico.input_term = nico.o.ce;
        } else {
            nico.input_term = -1;
        }
        nico.premiumNo = nico.o.is_premium;
        nico.enableTab(nico.tabmenu.ng_tab);
        if (nico.premiumNo == 1) {
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            //コマンドバーにプレミアム限定ボタン分の間をあける
            command_bar.small._x += 156;
            command_bar.big._x += 156;
            command_bar.ue._x += 156;
            command_bar.shita._x += 156;
            command_bar.sage._x += 156;
            command_bar.line._x += 156;
            command_bar.zero_width._x += 156;
            command_bar.mincho._x += 156;
            command_bar.maru._x += 156;
            //コマンドバーにプレミアム限定ボタン表示
            command_bar.white2._visible = true;
            command_bar.blue2._visible = true;
            command_bar.purple2._visible = true;
            command_bar.orange2._visible = true;
            command_bar.green2._visible = true;
            command_bar.yellow2._visible = true;
            command_bar.red2._visible = true;
            command_bar.black._visible = true;
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            var v14 = nico.HTTP_INTERVAL_PREMIUM;
            var v13 = nico.HTTP_INTERVAL_SHORT_PREMIUM;
            nico.command_addPage(1);
            //自動再生、ニコ割、プレミアムに登録テキスト
            nico.System_menu.marqueeSkipCheckBox.enabled = true;
            nico.System_menu.autoPlayCheckBox.enabled = true;
            nico.System_menu.autoPlayPremiumText._visible = false;
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            header.icon_premium._visible = true;
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            nico.header.icon_premium._visible = true;
            nico.header.icon_premium.onRelease = function() {
                getURL('http://help.nicovideo.jp/premium/', '_blank');
                nico.playerPause(true);
            };
            if (!e && !mm && !owner_thread_edit_mode) {
                nico.enableTab(nico.tabmenu.wayback_tab);
            }
            nico.AddSystemMessage(nico.getSystemMessage('プレミアムコマンドが使用できます。'));
        } else { //一般会員
            nico.header.icon_nicowari._visible = false;
        }
        if (owner_thread_edit_mode) {
            nico.command_addPage(2);
        }
        if (!nico.o.user_id && nico.o.closed) {
            nico.AddSystemMessage(nico.getSystemMessage('ログインして下さい＞＜'));
            nico.Connection.DoDisconnect();
        } else {
            if (nico.o.l != undefined && nico.o.url != undefined) {
                if (nico.o.deleted > 0) {
                    var v8;
                    switch (int(nico.o.deleted)) {
                    case 2:
                        v8 = '使っちゃいけない';
                        break;
                    case 3:
                        v8 = '権利者により削除された';
                        break;
                    default:
                        v8 = '削除された';
                    }
                    nico.AddSystemMessage(nico.getSystemMessage('動画は' + v8 + 'みたいです。'));
                }
                nico.ServerHost = nico.o.ms;
                nico.Connection.setServerHost(nico.ServerHost);
                nico.ThreadCreateDate = new Date(int(nico.o.thread_id) * 1000);
                nico.tabmenu.wayback_menu.wayback_date.selectableRange = {
                    rangeStart: new Date(nico.ThreadCreateDate.getFullYear(), nico.ThreadCreateDate.getMonth(), nico.ThreadCreateDate.getDate()),
                    rangeEnd: nico.StartDate
                };
                nico.video_base._visible = true;
                //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                if (local_file_found) {
                    nico.o.url = local_server_name[local_server_num] + local_file_name;
                    showInfoOnMainBar("ローカルサーバから再生します");
                    //showInfoOnMainBar(local_file_name);
                    header.icon_local._visible = true;
                    header.icon_narrow._visible = false;
                }
                //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
                var opinterval = nico.OPENPLAYER_INTERVAL;
                if (nico.premiumNo == 1) {
                    opinterval = nico.OPENPLAYER_INTERVAL_PREMIUM;
                }
                var current_thread_id = nico.o.thread_id;
                var community_thread_id;
                if (is_community_thread) {
                    current_thread_id = nico.o.optional_thread_id;
                    community_thread_id = nico.o.thread_id;
                }
                if (!current_thread_id || is_community_video) {
                    nico.userButtonMessageSlots = undefined;
                } else {
                    if (!owner_thread_edit_mode) {
                        nico.enableTab(nico.tabmenu.loglist_tab);
                        if (!nico.mainTab) {
                            nico.mainTab = nico.tabmenu.loglist_tab;
                        }
                    }
                }
                var v9 = util.ObjectUtils.bind(function() {
                    nico.openPlayerIntervalID = setInterval(nico.OpenPlayerAndConnect, opinterval, current_thread_id, nico.o.url, nico.o.l, nico.o.link, movie_type, nico.o.deleted, nico.o.nicos_id, community_thread_id);
                },
                this);
                if (!v9) { //TubePlayerでutil.ObjectUtils.bindが動かない
                    v9 = nico.openPlayerIntervalID = setInterval(nico.OpenPlayerAndConnect, opinterval, current_thread_id, nico.o.url, nico.o.l, nico.o.link, movie_type, nico.o.deleted, nico.o.nicos_id, community_thread_id);
                }
                if (!nico.o.needs_key) {
                    v9();
                } else {
                    nico.getThreadKey(nico.o.thread_id, v9);
                } // end else if
            } else {
                if (!success) {
                    var v8 = '接続できませんでした。';
                } else {
                    var v8 = '動画情報の取得に失敗しました。';
                }
                nico.AddSystemMessage(v8);
                if (nico.o.error != undefined) {
                    nico.AddSystemMessage(nico.o.error);
                    if (nico.o.error == 'play_key_expired') {
                        nico.showWindow(nico.getSystemMessage('接続エラー', 'errorDialog', '動画再生キーが不正です。'));
                    }
                    nico.ClearOverlay(true);
                    nico.player.dummy_play();
                }
                nico.Connection.DoDisconnect();
            }
        }
        if (nico.o.hms != undefined) {
            nico.hirobaConfig.hmsp = int(nico.o.hmsp);
            nico.hirobaConfig.hmst = nico.o.hmst;
            nico.hirobaConfig.hmstk = nico.o.hmstk;
            nico.hirobaConfig.hms = nico.o.hms;
        } else {
            nico.AddSystemMessage('広場への接続は行いません。');
        }
        nico.playstats_so.flush();
        if (nico.o.msg != undefined) {
            nico.AddSystemMessage(nico.o.msg);
        }
    };
    //コメントサーバから切断されたときの処理
    nico.Connection.onClose = function() {
        nico.CloseInput();
        nico.closeInterval();
        nico.AddSystemMessage(nico.getSystemMessage('メッセージサーバーから切断しました。'));
        nico.MsgGetStatus = -1;
        if (!nico.nocompress) {
            nico.nocompress = 1;
            nico.AddSystemMessage(nico.getSystemMessage('メッセージサーバーに再接続します。'));
            nico.ms_waittime = new Date().getTime();
            nico.lastConnectBoard = function() {
                nico.connectBoard(false);
            };
            nico.lastConnectBoard();
        } else {
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if (test_mode) {
                locationReload(30);
            }
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        }
    };
    //ロールオーバーウィンドウの待ち時間を短くする
    nico.lineWindowShowTime = 200;
    /*↓↓ 実行されなくなったので元に戻す
    //@CM・@BGMがある場合、getBgmsでopenPlayerFuncが実行されるので独立させた改編部detaModify()を追加して上書き
    nico._getBgms = nico.getBgms;
    nico.getBgms = function () {
        nico._getBgms();
        //dataModify();
    };
    */
    //動画及びコメントサーバへの接続開始(nico.playerへの上書きはここ)
    //nico._OpenPlayerAndConnect = nico.OpenPlayerAndConnect;
    nico.OpenPlayerAndConnect = function(thread_id, url, l, link, video_type, deleted, nicos_id, community_id) {
        clearInterval(nico.openPlayerIntervalID);
        nico.openPlayerFunc = function() {
            var v1 = url.substr(7).split('.');
            if (v1[0].indexOf('smile-') == 0) {
                v1[0] = v1[0].substr(6);
            }
            nico.AddSystemMessage(nico.getSystemMessage('動画ホスト') + ':' + v1[0]);
            nico.OpenPlayer(thread_id, url, l, link, video_type, deleted, nicos_id, community_id);
            nico.ms_waittime = new Date().getTime();
            if (! (nico.isShiSwfPlayer() || hold_connect_board)) {
                nico.lastConnectBoard = function() {
                    nico.connectBoard(false);
                };
                nico.lastConnectBoard();
            } else {
                //動画のgetBytesLoadedが増加したのを確認してからconnectBoardを実行
                checkVideoBytesLoaded();
            }
        };
        //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        //nico.OpenPlayerでnico.playerが宣言されるのでnico.playerへの関数上書き等を実行
        // swfを自動再生してしまった場合のために音量を0に
        /*
            if (!auto_play){
              nico.player.setVolume(0);
            } // end if

            if (nico.player.playStart){
                nico.player.playStart = function (player, video){
                    if (play_start_flag){
                        return ;
                    } // end if
              if (player._loadedFrames >= Math.min(player._totalFrames, player.BEFORHAND_FRAME)) {
                //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                //swfに自動再生許可を適用
                if (!player.isPlaying && auto_play) {
                  player.isPlaying = true;
                  player.isPausing = false;
                  player.updateState();
                  video.play();
                }else{
                  video.gotoAndStop(1);
                  player.isPlaying = true;
                  player.isPausing = true;
                  player.updateState();
                }
                //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
              } else {
                video.gotoAndStop(1);
              }
                };//en of nico.player.playStart
            } // end if
            */
        if (load_hiroba) {
            if (!thumbWatch && nico.player_lang == 'ja' && !e && !owner_thread_edit_mode && !nico.noNicotic) {
                nico.getHirobaPlayer();
            }
        }
        if (nico.atBgms) {
            if (!owner_thread_edit_mode) {
                nico.initBGM(thread_id);
            } else {
                nico.isInitBGM = true;
            }
        }
        nico.openPlayerFunc();
        dataModify();
        //@CM系の上書き処理対策
    };
    nico._connectBoard = nico.connectBoard;
    nico.connectBoard = function(update, wayback, isButtonClick) {
        nico._connectBoard(update, wayback, isButtonClick);
        //nico.connectBoardでnico.resMaxが設定されているはずなので実行
        if (resMax_overwrite) {
            resMax = resMax_overwrite_num;
        } else {
            resMax = nico.resMax;
        }
    };
    //nico.videowindow.playButton.onRelease
    nico.outAdAndplay = function(noPlay) {
        nico.uracom_mode_on(nico.uracom_mode);
        nico.adPlay = true;
        nico.isLargeOK = true;
        nico.videowindow.playButton._visible = false;
        nico.tabmenu.adView._visible = false;
        nico.video_base.thmbImage_mc._visible = false;
        nico.titleContainer._visible = false;
        nico.descriptionContainer._visible = false;
        nico.Overlay._alpha = 100;
        nico.video_base_video._visible = true;
        nico.coordinatesLayer._visible = true;
        if (has_owner_thread) {
            if (!disable_nicoscript) {
                nico.addScriptLoad();
            }
            nico.initScript();
        }
        nico.updateTab(nico.selectTab_mc);
        if (!noPlay) {
            nico.playerPause(false);
        }
        //再生開始最大化
        if (first_time_full) {
            first_time_full = false;
            if (nico.isLargeOK) {
                if (!nico.isLargeScreen) { //最大化状態でない
                    nico.controller.controller_submenu.LargeScreenButton.onRelease();
                }
            }
        }
    };
    //広場アイコン
    nico.hirobaButtonUpdate = function() {
        if (nico.hirobaIsReady && !nico.marqueePlayer.nowMarqueePause && nico.startedVideo) {
            nico.hirobaButton._visible = !nico.hirobaMode;
            nico.hirobaBackButton._visible = nico.hirobaMode;
            if (load_hiroba) {
                if (!e && !owner_thread_edit_mode) {
                    header.icon_hiroba._visible = true;
                } else {
                    header.icon_hiroba._visible = false;
                }
            }
        } else {
            nico.hirobaButton._visible = false;
            nico.hirobaBackButton._visible = false;
            header.icon_hiroba._visible = false;
        }
    };
    //自動再生のチェックBOX
    nico.autoPlayCheckListener.click = function() {
        nico.autoPlay_so.data.flag = nico.System_menu.autoPlayCheckBox.selected;
        nico.autoPlay_so.flush();
        auto_play = nico.System_menu.autoPlayCheckBox.selected;
        auto_play_so.data.flag = nico.System_menu.autoPlayCheckBox.selected;
        auto_play_so.flush();
    };
    nico.System_menu.autoPlayCheckBox.addEventListener('click', nico.autoPlayCheckListener);
    if (nico.autoPlay_so.data.flag != undefined) {
        nico.System_menu.autoPlayCheckBox.selected = auto_play_so.data.flag;
    }
    //ニコ割(時報(CM含む)、ニコ割ゲーム、ニコ割アンケート)のチェックBOX
    nico.marqueeSkipCheckListener.click = function() {
        nico.marqueeSkip_so.data.flag = nico.System_menu.marqueeSkipCheckBox.selected;
        nico.marqueeSkip_so.flush();
        //標準プレイヤーを使うと上書きされるので保存用
        marquee_skip_so.data.flag = nico.System_menu.marqueeSkipCheckBox.selected;
        marquee_skip_so.flush();
    };
    nico.System_menu.marqueeSkipCheckBox.addEventListener('click', nico.marqueeSkipCheckListener);
    if (nico.marqueeSkip_so.data.flag != undefined) {
        nico.System_menu.marqueeSkipCheckBox.selected = marquee_skip_so.data.flag;
    }
    //nicoplayerのレイアウト変更
    //flvplayerのヘッダを消す、事もある
    nico.header._visible = design.nico_header.mode[design_mode];
    //各部を移動・サイズ調整
    if (nico.videowindow.getDepth() < nico.controller.getDepth()) {
        nico.DeleteLabel.swapDepths(nico.controller);
        nico.videowindow.swapDepths(nico.controller);
    }
    // ヘッダを画面外に押し出す。マーキー部分だけ戻しておく
    // marquee_baseがニュースとか
    // bgm_marquee_baseはニコ割とかBGM(再生時にインスタンスが作成されるのでその時に移動する)
    // marquee_imageは黒バックにロゴの静止画(表示させると透明化時透けて見える)
    // logoは不明
    nico.header._y -= 100;
    nico.header.marquee_base._y += 100 + design.nico_header.y[design_mode];
    //  nico.header.bgm_marquee_base._y += 100 + design.nico_header.y[design_mode];
    //  nico.header.marquee_image._y += 100 + design.nico_header.y[design_mode];
    //  nico.header.logo._y += 100 + design.nico_header.y[design_mode];
    nico.videowindow._y += design.nico_video.y[design_mode];
    nico.controller._y += design.nico_controll.y[design_mode];
    nico.inputArea._y += design.nico_input.y[design_mode];
    nico.tabmenu._y += design.nico_tab.y[design_mode];
    nico.tabmenu._height += design.nico_tabsize.y[design_mode];
    if (clip_height) {
        nico.tabmenu._height -= 16;
        nico.tabmenu._y += 2;
        loglist_menu._y -= 2;
    }
    //nico.tabmenu.loglist_menu.LogList._y -= 2;
    //nico.tabmenu.loglist_menu.LogList._height += 2;
    //nico.DEFAULT_LOGLIST_Y = nico.tabmenu.loglist_menu.LogList._y;
    //なんとなくバーを太く
    if (wide_seek_bar) {
        nico.controller.seek_bar._height += 6;
        nico.controller.seek_bar._y -= 3;
        nico.controller.loaded._height += 6;
        nico.controller.loaded._y -= 3;
    }
    if (Stage.height < bottom_line._y + 31) {
        //下の枠線を表示
        bottom_line._visible = true;
    } else {
        large_stage = true;
        //wrapperの下部にスペースがあればコマンドバーを配置
        command_bar._y = bottom_line._y + 1;
        command_bar_default_y = command_bar._y;
        command_bar._visible = true;
        hide_bar._y = bottom_line._y + 1;
        hide_bar_default_y = command_bar._y;
        hide_bar._visible = true;
        bottom_line._y += 30;
        bottom_line._visible = true;
    }
    //編集モード時のボタン位置を調整
    if (e) {
        nico.LogList_menu.checkUser._visible = false;
        loglist_menu.normal_list._x -= 20;
        loglist_menu.cand_ng_id_list._x -= 20;
    }
    //  if(test_mode){
    if (!is_video_owner) {
        nico.enableTab(nico.tabmenu.filter_tab); // フィルタータブを有効にする
        nico.tabmenu.filter_menu.filterAllCheck._visible = false;
        nico.tabmenu.filter_menu.filterSrcText._visible = false;
        nico.tabmenu.filter_menu.allCheckFilterButton._visible = false;
        nico.tabmenu.filter_menu.allCancelFilterButton._visible = false;
        nico.tabmenu.filter_menu.deleteFilterButton._visible = false;
        nico.tabmenu.filter_menu.addFilterButton._visible = false;
        nico.tabmenu.filter_menu.filterDesText._visible = false;
        //nico.tabmenu.filter_menu.lenText._y += 100;
        //nico.tabmenu.filter_menu.filterList._y -= 135;
        //nico.tabmenu.filter_menu.filterList.swapDepths(nico.tabmenu.filter_menu.getNextHighestDepth());
        nico.tabmenu.filter_menu.createEmptyMovieClip("innocent_wall", nico.tabmenu.filter_menu.getNextHighestDepth());
        nico.tabmenu.filter_menu.innocent_wall.tabEnabled = false;
        nico.tabmenu.filter_menu.innocent_wall.beginFill(0xffffff, 100);
        nico.tabmenu.filter_menu.innocent_wall.moveTo(0, 0);
        nico.tabmenu.filter_menu.innocent_wall.lineTo(0, 115);
        nico.tabmenu.filter_menu.innocent_wall.lineTo(300, 115);
        nico.tabmenu.filter_menu.innocent_wall.lineTo(300, 0);
        nico.tabmenu.filter_menu.innocent_wall.lineTo(0, 0);
        nico.tabmenu.filter_menu.innocent_wall.endFill();
        nico.tabmenu.filter_menu.innocent_wall._x = 5;
        nico.tabmenu.filter_menu.innocent_wall._y = 5;
    }
    //  }
    //nicoplayerのNGユーザー・NGコメントボタンを消す
    nico.LogList_menu.addNGWord._visible = false;
    nico.LogList_menu.addNGUserID._visible = false;
    //ログリスト類の行間を詰めてみる
    //nico.LogList.layoutY = nico.LogList.__set__rowHeight(19);
    //nico.LogList_ownerthread.layoutY = nico.LogList_ownerthread.__set__rowHeight(19);
    //nico.tabmenu.wayback_menu.LogList_Wb.layoutY = nico.tabmenu.wayback_menu.LogList_Wb.__set__rowHeight(19);
    //swfversion7でタブのフォントのスペーシングがなにやらおかしいのでフォントを変更
    if (useswfversion == 7) {
        nico.tab_fmt.font = "_sans";
        nico.tab_fmt.letterSpacing = 0;
        var tabLists = new Array(nico.tabmenu.loglist_tab, nico.tabmenu.wayback_tab, nico.tabmenu.ownerthread_tab, nico.tabmenu.system_tab, nico.tabmenu.filter_tab, nico.tabmenu.ng_tab, nico.tabmenu.relation_tab);
        for (var tab in tabLists) {
            tabLists[tab].text.setNewTextFormat(nico.tab_fmt);
            tabLists[tab].text.text = tabLists[tab].name;
        }
    }
    //コンテキストメニューを追加
    if (useswfversion >= 7) {
        var videowindowCM = nico.myContextMenu.copy();
        videowindowCM.customItems.push(cmi_play);
        videowindowCM.customItems.push(cmi_pause);
        videowindowCM.customItems.push(screen_full);
        videowindowCM.customItems.push(screen_normal);
        videowindowCM.customItems.push(cmi_smoothing_on);
        videowindowCM.customItems.push(cmi_smoothing_off);
        videowindowCM.customItems.push(cmi_aspect_original);
        videowindowCM.customItems.push(cmi_aspect_4_3);
        videowindowCM.customItems.push(cmi_aspect_16_9);
        videowindowCM.customItems.push(cmi_switch_add_id_overlay);
        //      videowindowCM.customItems.push(cmi_clear_allmessages);
        cmi_smoothing_on.visible = true;
        cmi_smoothing_off.visible = true;
        cmi_aspect_original.visible = true;
        //      cmi_clear_allmessages.visible = true;
        cmi_aspect_4_3.visible = true;
        cmi_aspect_16_9.visible = true;
        cmi_switch_add_id_overlay.visible = true;
        videowindowCM.onSelect = function(obj, menu) {
            if (nico.player.isPausing) { //再生中
                cmi_play.enabled = true;
                cmi_play.visible = true;
                cmi_pause.enabled = false;
                cmi_pause.visible = false;
            } else {
                cmi_play.enabled = false;
                cmi_play.visible = false;
                cmi_pause.enabled = true;
                cmi_pause.visible = true;
            }
            if (!nico.isLargeScreen) { //最大化状態でない
                screen_full.enabled = true;
                screen_full.visible = true;
                screen_normal.enabled = false;
                screen_normal.visible = false;
            } else {
                screen_full.enabled = false;
                screen_full.visible = false;
                screen_normal.enabled = true;
                screen_normal.visible = true;
            }
            if (!nico.isShiSwfPlayer()) {
                if (smoothing) {
                    cmi_smoothing_on.enabled = false;
                    //cmi_smoothing_on.visible = false;
                    cmi_smoothing_off.enabled = true;
                    //cmi_smoothing_off.visible = true;
                } else {
                    cmi_smoothing_on.enabled = true;
                    //cmi_smoothing_on.visible = true;
                    cmi_smoothing_off.enabled = false;
                    //cmi_smoothing_off.visible = false;
                }
                if (nico.player.videoStream_width != undefined && nico.player.videoStream_height != undefined) {
                    //cmi_aspect_original.visible = true;
                    if (nico.player.videoStream_width / nico.player.videoStream_height == nico.video_base_video._width / nico.video_base_video._height) {
                        cmi_aspect_original.enabled = false;
                        //cmi_aspect_original.visible = false;
                    } else {
                        cmi_aspect_original.enabled = true;
                        //cmi_aspect_original.visible = true;
                    }
                }
                if (4 / 3 == nico.video_base_video._width / nico.video_base_video._height) {
                    cmi_aspect_4_3.enabled = false;
                    //cmi_aspect_4_3.visible = false;
                } else {
                    cmi_aspect_4_3.enabled = true;
                    //cmi_aspect_4_3.visible = true;
                }
                if (16 / 9 == nico.video_base_video._width / nico.video_base_video._height) {
                    cmi_aspect_16_9.enabled = false;
                    //cmi_aspect_16_9.visible = false;
                } else {
                    cmi_aspect_16_9.enabled = true;
                    //cmi_aspect_16_9.visible = true;
                }
            }
        };
        nico.videowindow.menu = videowindowCM;
        var loglistCM = nico.myContextMenu.copy();
        loglistCM.customItems.push(cmi_copy_id);
        loglistCM.customItems.push(cmi_copy_message);
        loglistCM.customItems.push(cmi_open_links);
        loglistCM.customItems.push(cmi_show_profile);
        loglistCM.customItems.push(cmi_switch_add_id);
        cmi_copy_id.visible = true;
        cmi_copy_message.visible = true;
        cmi_open_links.visible = true;
        cmi_show_profile.visible = true;
        cmi_switch_add_id.visible = true;
        loglistCM.onSelect = function(obj, menu) {
            if (obj.selectedItem != undefined) {
                cmi_copy_id.enabled = true;
                //cmi_copy_id.visible = true;
                cmi_copy_message.enabled = true;
                //cmi_copy_message.visible = true;
                var flag = true; //生IDでなければfalseを入れる
                var id = obj.selectedItem.user;
                var l = id.length;
                if (l == 27) {
                    flag = false;
                } else {
                    for (var i = 0; i < l; i++) {
                        var c = id.charAt(i);
                        if (!checkNum(c)) {
                            flag = false;
                            break;
                        }
                    }
                }
                if (flag) {
                    cmi_show_profile.enabled = true;
                    //cmi_show_profile.visible = true;
                } else {
                    cmi_show_profile.enabled = false;
                    //cmi_show_profile.visible = false;
                }
                var mes = obj.selectedItem.message;
                if (add_id) {
                    var index = mes.indexOf('] ');
                    if (index > 0) {
                        mes = mes.substr(index + 2);
                    }
                }
                var cand_links = searchMessage(mes);
                if (cand_links.length > 0) {
                    cmi_open_links.enabled = true;
                    //cmi_open_links.visible = true;
                } else {
                    cmi_open_links.enabled = false;
                    //cmi_open_links.visible = false;
                }
            } else {
                cmi_copy_id.enabled = false;
                //cmi_copy_id.visible = false;
                cmi_copy_message.enabled = false;
                //cmi_copy_message.visible = false;
                cmi_show_profile.enabled = false;
                //cmi_show_profile.visible = false;
                cmi_open_links.enabled = false;
                //cmi_open_links.visible = false;
            }
        };
        nico.LogList.menu = loglistCM;
        nico.LogList_ownerthread.menu = loglistCM;
        nico.LogList_menu.LogList_Nicos.menu = loglistCM;
        nico.tabmenu.wayback_menu.LogList_Wb.menu = loglistCM;
        nico.tabmenu.wayback_menu.LogList_Wb_Nicos.menu = loglistCM;
    }
    //公式のNGMessage処理
    nico.NGMessage = function(msgs, slots, list, index, flag) {
        if (nico.hirobaMode) {
            return undefined;
        }
        var v1 = msgs[index];
        var v4 = nico.ngListDP;
        if (v1._backup != undefined) {
            v1._message = v1._backup;
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            if (add_id) { //add_idならeditFieldする前にメッセージにID付与
                if (msgs == nico.Messages) {
                    v1._backup = "[" + fwMessages[index].user_id.substr(0, id_length) + "] " + v1._backup;
                    if (fwMessages[index].premium) {
                        v1._backup = "P[" + v1._backup;
                    }
                }
            }
            ngmessage_flag[index] = false;
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            list.editField(nico.findLogList(v1._no, list), 'message', v1._backup);
            v1._backup = undefined;
        }
        if (v1._backUpMsg != undefined) {
            v1 = v1._backUpMsg;
            v1._backUpMsg = undefined;
            msgs[index] = v1;
        }
        if (nico.ng_menu.ng184.selected && v1._ng184 == 1) {
            v1._backup = v1._message;
            v1._message = undefined;
            list.editField(nico.findLogList(v1._no, list), 'message', nico.getSystemMessage('###このコメントは表示されません###'));
            //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
            ngmessage_flag[index] = true;
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        } else {
            if (nico.ng_menu.ngCheck.selected) {
                var v3 = nico.getServerTime();
                var v9 = '';
                var v8 = '';
                if (v3.getHours() < 10) {
                    v9 += '0';
                }
                v9 += v3.getHours();
                if (v3.getMinutes() < 10) {
                    v8 += '0';
                }
                v8 += v3.getMinutes();
                var v2 = 0;
                while (v2 < v4.length) {
                    var v12 = nico.strReplace(nico.strReplace(v4[v2].source, '\r\n', '\n'), '\r', '\n');
                    var v11 = nico.strReplace(nico.strReplace(v1._message, '\r\n', '\n'), '\r', '\n');
                    if ((v11.indexOf(v12) >= 0 && v4[v2].type == 'word') || (v1._user == v4[v2].source && v4[v2].type == 'id')) {
                        nico.ngListDP[v2].lastHit = v3.getFullYear() + '/' + (v3.getMonth() + 1) + '/' + v3.getDate() + ' ' + v9 + ':' + v8;
                        v1._backup = v1._message;
                        v1._message = undefined;
                        list.editField(nico.findLogList(v1._no, list), 'message', nico.getSystemMessage('###このコメントは表示されません###'));
                        ngmessage_flag[index] = true;
                        break;
                    }
                    if (v4[v2].type == 'command' && v1._mail != '') {
                        var v7 = false;
                        var v10;
                        if (v4[v2].source == 'all') {
                            v7 = true;
                            nico.ngListDP[v2].lastHit = v3.getFullYear() + '/' + (v3.getMonth() + 1) + '/' + v3.getDate() + ' ' + v9 + ':' + v8;
                            v10 = '';
                        } else {
                            var v5 = v1._mail.split(' ');
                            for (var v14 in v5) {
                                if (v5[v14] == v4[v2].source) {
                                    v7 = true;
                                    v5[v14] = '';
                                    nico.ngListDP[v2].lastHit = v3.getFullYear() + '/' + (v3.getMonth() + 1) + '/' + v3.getDate() + ' ' + v9 + ':' + v8;
                                    break;
                                }
                            }
                            v10 = v5.join(' ');
                        }
                        if (v7) {
                            var v6;
                            if (v1._backUpMsg != undefined) {
                                v6 = v1._backUpMsg;
                            } else {
                                v6 = v1;
                            }
                            v1 = nico.CreateMessage(nico.ms._thread_id, v1._no, v1._user, v1._vpos, v1._name, v10, v1._message, v1._mine, v1._deleted, v1._premium_flag, v1._isOwnerThread, v1._buttonMessage);
                            v1._backUpMsg = v6;
                            v1._buttonMessage = v6._buttonMessage;
                            v1._threadOrder = v6._threadOrder;
                            msgs[index] = v1;
                        }
                        /*
              if (v4[v2].source == 'all') {
                nico.ngListDP[v2].lastHit = v3.getFullYear() + '/' + (v3.getMonth() + 1) + '/' + v3.getDate() + ' ' + v7 + ':' + v6;
                v8 = '';
              } else {
                var v5 = v1._mail.split(' ');
                for (var v13 in v5) {
                  if (v5[v13] == v4[v2].source) {
                    v5[v13] = '';
                    nico.ngListDP[v2].lastHit = v3.getFullYear() + '/' + (v3.getMonth() + 1) + '/' + v3.getDate() + ' ' + v7 + ':' + v6;
                    break;
                  }
                }
                v8 = v5.join(' ');
              }
              var v9;
              if (v1._backUpCommand != undefined) {
                v9 = v1._backUpCommand;
              } else {
                v9 = v1._mail;
              }
              //ms._thread_idとあるが、ミスタイプ？
              //変更してみた
              v1 = nico.CreateMessage(v1._thread_id, v1._no, v1._user, v1._vpos, v1._name, v8, v1._message, v1._mine, v1._deleted, v1._premium_flag, v1._isOwnerThread, v1._buttonMessage);
              v1._backUpCommand = v9;
              msgs[index] = v1;
*/
                    }++v2;
                }
            }
        }
        if (!flag) {
            nico.HideMessages(slots);
            nico.UpdateMessages(nico.player.playheadTime, slots, msgs);
        }
    };
    /*
// nicoplayerのデバッグ情報をシステムタブに表示する
    nico.DebugOut = function (mes) {
        nico.AddSystemMessage(mes);
    };
    nico.funcDebugOut = function (mes) {
        nico.AddSystemMessage(mes);
    };
*/
    nico._playCM = nico.playCM;
    nico.playCM = function(cmid) {
        var cmRet = nico._playCM(cmid);
        if (nico.now_cm) {
            if (hide_icon_cm) header.icon_cm._visible = true;
            pre_clock_mode = clock_mode; //一時的な値
            clock_mode = 2;
            // clock_mode = 2 は保存しない(CM中に他の動画に行くと2で始まって表示されない)
            //          clock_mode_so.data.number = clock_mode;
            //          clock_mode_so.flush();
            // なくても一秒後には表示が更新されるけど
            showClockInfo(clock_mode);
            // nico.headerをずらした分だけ戻す
            nico.header.bgm_marquee_base._y = nico.header.marquee_base._y;
            // 透けて見えてしまうので、ニュースのマーキーを消す
            nico.header.marquee_base._visible = false;
            // autopop_cmの処理
            Show_marquee();
        }
        return cmRet;
    };
    nico._stopCM = nico.stopCM;
    nico.stopCM = function() {
        // 時報表示時はstopCMが呼ばれ続けるので、CM再生中なら消すことに
        if (nico.now_cm) {
            if (hide_icon_cm) header.icon_cm._visible = false;
            // pre_clock_modeが0だと失敗するので、undefinedできちんと判定
            if (pre_clock_mode != undefined) {
                clock_mode = pre_clock_mode; //@cmが終わったら戻す
                pre_clock_mode = undefined; //@cmは最初にnico.stopCMが呼ばれる
                showClockInfo(clock_mode);
            }
            // ニュースのマーキーを戻す
            nico.header.marquee_base._visible = true;
            // autopop_cmの処理
            Hide_marquee();
        }
        // 時報時はこれで判定
        var jihou_pause = nico.header.marquee_base.marquees_info[nico.header.marquee_base.marquee_index].pause;
        if (jihou_pause == 1 && !jihou_timer) {
            Show_marquee();
            // 時報の消去用タイマーイベントのセット
            jihou_timer = setInterval(CheckJihouEnd, 1000);
        }
        return nico._stopCM();
    };
}
//@CM・@BGMがある場合、getBgmsでopenPlayerFuncが実行されるので独立させた改detaModify()を追加して上書き

function dataModify() {
    //動画のメタデータを受け取ったときの処理
    nico.player.stream_ns.onMetaData = function(infoObject) {
        nico.player.videoStream_width = infoObject.width;
        nico.player.videoStream_height = infoObject.height;
        nico.player.setAspect();
        nico.player.realLen = infoObject.duration;
        if (nico.player.realLen > 0) {
            nico.player._contentLength = nico.player.realLen;
        }
        //for (var v3 in obj) {
        //  nico.player.DebugOut('onMetaData: ' + v3 + ' = ' + infoObject[v3]);
        //}
        //varDump(infoObject);
        if (video_info == undefined) {
            video_info = infoObject;
            if (video_info.framerate != undefined) {
                clock_info.movie_type = "flv";
            } else if (video_info.videoframerate != undefined) {
                clock_info.movie_type = "mp4";
            } else {
                clock_info.movie_type = movie_type;
            }
            if (video_info.width != undefined && video_info.height != undefined) {
                clock_info.movie_resolution = Math.round(video_info.width) + "x" + Math.round(video_info.height);
            }
            if (video_info.framerate != undefined) {
                clock_info.movie_framerate = Math.round(video_info.framerate) + "fps";
            }
            if (video_info.videoframerate != undefined) {
                clock_info.movie_framerate = Math.round(video_info.videoframerate) + "fps";
            }
            if (video_info.videodatarate != undefined && video_info.audiodatarate != undefined) {
                clock_info.movie_datarate = Math.round(video_info.videodatarate) + "+" + Math.round(video_info.audiodatarate) + "kbps";
            }
            if (clock_info.movie_datarate == "") {
                if (nico.player.stream_ns.bytesTotal != undefined) {
                    if (nico.player._contentLength != undefined) {
                        clock_info.movie_datarate = Math.round(nico.player.stream_ns.bytesTotal * 8 / nico.player._contentLength / 1000) + "kbps";
                    }
                }
            }
            /*
                if(video_info.keyframes.times.length > 1){
                    var max_seek = video_info.keyframes.times[0];
                    for(var i=1, l = video_info.keyframes.times.length; i<l; i++){
                        if(video_info.keyframes.times[i] - video_info.keyframes.times[i-1] > max_seek){max_seek = video_info.keyframes.times[i] - video_info.keyframes.times[i-1];}
                    }
                    clock_info_text += "シーク：" + Math.round(max_seek) + "sec";
                }
                */
            showClockInfo(clock_mode);
            //動画のアスペスクトを合わせる
            changeAspect(nico.player.videoStream_width, nico.player.videoStream_height);
            //スムージング＆デブロッキングをオフにする
            if (auto_smoothing_off) {
                changeSmoothing(false, false);
            } else if (auto_smoothing && nico.player.videoStream_width % 512 == 0 && (nico.player.videoStream_height % 384 == 0 || nico.player.videoStream_height % 288 == 0)) {
                changeSmoothing(false, true);
            } else {
                changeSmoothing(true, false);
            }
        }
    };
    nico.player._play = nico.player.play;
    nico.player.play = function(url, len) {
        if (url != undefined) {
            onPlayProc();
        }
        nico.player._play(url, len);
    };
    nico.player._pause = nico.player.pause;
    nico.player.pause = function() {
        if (nico.player.isPausing) {
            onPlayProc();
        } else {
            onPauseProc();
        }
        nico.player._pause(url, len);
    };
    //レイアウト調整した値をデフォルトにする
    nico.player.VIDEOWINDOW_DEFAULT_Y = nico.videowindow._y;
    nico.player.CONTROLLER_DEFAULT_X = nico.controller._x;
    nico.player.CONTROLLER_DEFAULT_Y = nico.controller._y;
    nico.player.CONTROLLER_DEFAULT_WIDTH = nico.controller._width;
    nico.INPUTAREA_DEFAULT_Y = nico.inputArea._y;
    //太いシークバー用にノブの高さを合わせる
    nico.player.Knob_mc._y = nico.player.Seeker_mc._y + nico.player.Seeker_mc._height / 2 - 1;
    //動画サーバから切断されたときの処理
    nico.player._dummy_play = nico.player.dummy_play;
    nico.player.dummy_play = function() {
        nico.player._dummy_play();
        if (test_mode) {
            locationReload(30);
        }
    };
    //プレイヤーのイベントリスナー処理
    nico.player._dispatchEvent = nico.player.dispatchEvent;
    nico.player.dispatchEvent = function(eventObject) {
        eventObject.target = this;
        if (eventObject.type == 'stateChange') {
            flash.external.ExternalInterface.call('setPlayerStatus', nico.player.state);
            //プレイヤーの状態変化処理を置き換える
            if (nico.player.state == 'load') {
                nico.getVideo(v, thumbPlayKey);
            }
            //ニコニ広告
            if (nico.player.state == 'paused') {
                nico.pauseNiconiCM();
            }
            if (nico.player.state == 'playing') {
                nico.pauseNiconiCM(); //ニコニ広告
                if (nico.startedVideo) {
                    if (!nico.adPlay) { //nico.outAdAndplay();が実行されてないか確認？autoPlayPremiumがtrueではない
                        if (!nico.muriyariOutAdAndplayFlag) {
                            nico.playerPause(true);
                        } else {
                            nico.outAdAndplay();
                        }
                        nico.muriyariOutAdAndplayFlag = true;
                    }
                } else { //一度目のload処理、autoplayなら再生する
                    nico.playlenIntervalId = setInterval(nico.setPlaylen, nico.PLAYLEN_INTERVAL);
                    if (load_hiroba) {
                        if (!e && !owner_thread_edit_mode && !thumbWatch && nico.player_lang == 'ja') {
                            nico.loadHirobaMovie();
                        }
                    }
                    nico.videowindow.loadingImage._visible = false;
                    if (!nico.autoPlayPremium) {
                        if (!auto_play) {
                            if (nico.isInitBGM || !bgms) {
                                nico.videowindow.playButton._visible = true;
                                if (load_marquee) { //マーキーを読み込む
                                    nico.getMarqueePlayer();
                                }
                            }
                            nico.titleContainer._visible = true;
                            nico.descriptionContainer._visible = true;
                            nico.video_base_video._visible = false;
                            nico.coordinatesLayer._visible = false;
                            nico.playerPause(true);
                            //nico.updateTab(nico.selectTab_mc);
                        } else { //auto_play true nico.autoPlay_so.data.flag false
                            outAdAndplay();
                        }
                    } else {
                        if (!nico.isInitBGM && bgms) {
                            nico.playerPause(true);
                            nico.uracom_mode_on(nico.uracom_mode);
                        } else {
                            nico.uracom_mode_on(nico.uracom_mode);
                            if (load_marquee) { //マーキーを読み込む
                                nico.getMarqueePlayer();
                            }
                        }
                    }
                    nico.player.updateVolume();
                    nico.startedVideo = true;
                }
                if (!nico.alreadyStarted) {
                    nico.playerPause(true);
                    nico.videowindow.seekingImage._visible = true;
                } else { //なぜかボタンが残る環境があるらしいので
                    if (auto_play) {
                        nico.videowindow.playButton._visible = false;
                        nico.videowindow.playButton._visible = false;
                        nico.tabmenu.adView._visible = false;
                        nico.video_base.thmbImage_mc._visible = false;
                        nico.titleContainer._visible = false;
                        nico.descriptionContainer._visible = false;
                    }
                }
                //ニコ割り@cm
                if (nico.now_cm && nico.now_cm.pause) {
                    nico.now_cm.pauseSave = !nico.player.isPlay();
                    nico.playerPause(true);
                }
            } // end playing
            if (nico.player.state == 'connectionError') {
                nico.ClearOverlay(true);
                nico.player.dummy_play();
                var v1 = new Date().getTime();
                v1 = v1 - nico.timeout_now;
                if (v1 <= 10000) {
                    nico.showWindow(nico.getSystemMessage("動画に接続できませんでした。", "errorDialog", "技術的な問題が発生しております。\n問題解消に向け努力しております。\nしばらく経った後、お試しください\n\n※クッキーの制限をされている場合、\nnicovideo.jp を許可願います。(www.nicovideo.jp ではありません)"));
                } else {
                    nico.showWindow(nico.getSystemMessage("接続がタイムアウトしました", "errorDialog", Math.round(v1 / 1000) + "秒間、応答がありませんでした。"));
                } // end if
            }
            if (nico.player.state == 'end') {
                if (!thumbWatch) {
                    nico.sendEvent(nico.player.totalTime + 1);
                    endFunction = function() {
                        if (nico.ReplayFlag) {
                            nico.player.rewind();
                            nico.player.pause();
                            if (nico.isPlayScroll) {
                                nico.LogList.vPosition = 0;
                            }
                        } else {
                            if (!e && !owner_thread_edit_mode && !now_wayback_time) {
                                nico.header.messeButton.play();
                                if (end_time_normal) { //再生終了時最小化
                                    if (nico.isLargeScreen) {
                                        nico.controller.controller_submenu.NormalScreenButton.onRelease();
                                    }
                                }
                                if (!nico.noRelation) {
                                    if (nico.relationDP == undefined) {
                                        if (!forbid_relation) {
                                            nico.getRelation_xml.load(nico.GETRELATION_URL + '?page=1&sort=p&order=d&video=' + wv_id);
                                        }
                                    } else {
                                        if (nico.hasRelation) {
                                            if (!forbid_relation) {
                                                nico.updateTab(nico.tabmenu.relation_tab);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }; //endFunction
                    //ニコニ広告再生
                    if (nico.hasNiconiCM) {
                        if (load_NiconiCM) {
                            if (nico.ReplayFlag && nico.isRepeatNoCM) {
                                endFunction();
                            } else {
                                nico.playNiconiCM();
                            }
                        } else {
                            endFunction();
                        }
                    } else {
                        endFunction();
                    }
                }
            }
            /*
            if (nico.player.state == 'end'){
              if (!thumbWatch) {
                nico.sendEvent(nico.player.totalTime + 1);
                if (!nico.ReplayFlag){
                    if (!e && !owner_thread_edit_mode && !now_wayback_time){
                        if(end_time_normal){
                            if(nico.isLargeScreen){
                                nico.controller.controller_submenu.NormalScreenButton.onRelease();
                            }
                        }
                        if (nico.hasRelation){
                            if (!forbid_relation){
                                nico.updateTab(nico.tabmenu.relation_tab);
                            }
                        }
              //}else{
              //  nico.getRelation_xml.load(nico.GETRELATION_URL + "?page=1&sort=p&order=d&video=" + nico.CurrentThreadID);
                      //}//end relationDP
                    }
                }else{
                    nico.player.rewind();
                    nico.player.pause();
                    if (nico.isPlayScroll){
                        nico.LogList.vPosition = 0;
                    }
                }
              } // end thumbWatch
            }*/
            nico.LastVposTime = getTimer();
            nico.LastVpos = eventObject.playheadTime;
            nico.listenerObject.playheadUpdate(eventObject);
        } else {
            this._dispatchEvent(eventObject);
        }
    };
};
// -------------------nicoplayerの関数上書きここまで----------------------
function locationReload(sec) {
    var javascript = "window.location.reload();";
    setTimeout(doJavaScript, sec * 1000, javascript);
}
//再生する直前にする処理

function onPlayProc() {
    //swfのために0にしていた音量を戻す
    if (!nico.player.sound.mute && nico.player.global_sound.getVolume() != nico.player.sound.volume) {
        nico.player.global_sound.setVolume(Math.max(0, Math.min(100, nico.player.sound.volume)));
    }
    //コメントと動画も読み込んであるときに無理矢理再生する。
    //NG処理など処理が長いとこうなる？
    if (!nico.startedVideo) {
        --nico.MsgGetStatus;
        nico.connectBoard();
    }
    //動画の末尾で再生した場合、動画の先頭に戻る
    if (nico.player._contentLength != undefined) {
        var state = nico.player.__get__state();
        if ((state == "end" || state == "buffering") && nico.player.__get__playheadTime() >= nico.player._contentLength - 1) {
            nico.player.__set__playheadTime(0);
            // endのままになってしまうので更新
            setTimeout(function() {
                nico.player.updateState();
            },
            1000);
        }
    }
    //オススメタブから最新コメントへ戻る
    if (nico.selectTab == nico.TAB_RELATION) {
        nico.updateTab(nico.tabmenu.loglist_tab);
    }
}
//一時停止する直前にする処理

function onPauseProc() {}
//テキストボックスからフォーカスを外す

function releaseFocus() {
    if (load_hiroba) { //広場を読み込むとなぜかbgにフォーカスしてもすぐに外れる。(テキストエリアにフォーカスが有るとき)
        Selection.setFocus(nico.tabmenu.relation_tab);
    } else {
        Selection.setFocus(bg);
    }
    //Selection.setFocus(null);
    return Selection.getFocus();
}
function varDump(obj) {
    var dump = "";
    for (var param in obj) {
        if (obj[param] instanceof Object || obj[param] instanceof MovieClip) {
            dump += param + " : " + typeof(obj[param]) + "\n";
            var temp = varDump(obj[param]).split('\n');
            for (var i = 0; i < temp.length; i++) {
                if (temp[i] != "") dump += "\t" + temp[i] + "\n";
            }
        } else {
            if (obj[param] == undefined) {
                dump += param + " = undefined\n";
            } else if (obj[param] == null) {
                dump += param + " = null\n";
            } else if (typeof(obj[param]) == 'string') {
                dump += param + " = '" + obj[param] + "' : " + typeof(obj[param]) + "\n";
            } else {
                dump += param + " = " + obj[param] + " : " + typeof(obj[param]) + "\n";
            }
        }
    }
    System.setClipboard(dump);
    return dump;
}
function detectFlashVer(reqMajorVer, reqMinorVer, reqRevision) {
    var v2 = System.capabilities.version;
    var v7;
    var v10;
    var v5;
    var v1;
    if (v2 == -1) {
        return false;
    } else {
        if (v2 != 0) {
            v7 = v2.split(' ');
            v5 = v7[1];
            v1 = v5.split(',');
            var v3 = v1[0];
            var v4 = v1[1];
            var v6 = v1[2];
            if (v3 > parseFloat(reqMajorVer)) {
                return true;
                return false;
            }
            if (v3 == parseFloat(reqMajorVer)) {
                if (v4 > parseFloat(reqMinorVer)) {
                    return true;
                    return false;
                }
                if (v4 == parseFloat(reqMinorVer)) {
                    if (v6 >= parseFloat(reqRevision)) {
                        return true;
                    }
                }
            }
            return false;
        }
    }
}
function showInfoOnMainBar(info) {
    if (design_mode == 0) {
        main_bar.main_info.text = info;
        main_bar.main_info.setTextFormat(black12_fmt);
        //      main_bar.main_info._x = 290 - main_bar.main_info.textWidth/2;
    } else {
        // バーを小さくした時はシステムタブに表示する
        if (info != '') {
            nico.AddSystemMessage('wrapper:' + info);
        }
    }
}
//スクリーン上の情報表示

function showInfoOnScreen(info, sec) {
    if (sec == undefined) {
        sec = 60;
    }
    screen.wrapper_info.text = info;
    screen.wrapper_info.setTextFormat(red24b_fmt);
    screen.wrapper_info._x = nico.videowindow._x + nico.video_base._width - screen.wrapper_info.textWidth;
    screen.wrapper_info._visible = true;
    setShowInfoOnScreenInterval(sec);
}
/*
function setAutoPlayInfo(){
    nico.videowindow._alpha = 100;
    screen.auto_play_info._visible = true;
    checkPlayerStart();
}

function clearAutoPlayInfo(){
    nico.videowindow._alpha = 100;
    screen.auto_play_info._visible = false;
}
*/

function changeSmoothing(change_flag, message_flag) {
    if (change_flag) {
        if (nico.isShiSwfPlayer()) {
            //nico.video_base_video._quality = "BEST";
        } else {
            if (message_flag) {
                showInfoOnMainBar("スムージング ON");
            }
            nico.video_base_video.smoothing = true;
            nico.video_base_video.deblocking = 5;
            smoothing = true;
            pref_menu.smoothing.on._visible = true;
            command_bar.smoothing._alpha = 40;
        }
    } else {
        if (nico.isShiSwfPlayer()) {
            //nico.video_base_video._quality = "LOW";
        } else {
            if (message_flag) {
                showInfoOnMainBar("スムージング OFF");
            }
            nico.video_base_video.smoothing = false;
            nico.video_base_video.deblocking = 0;
            smoothing = false;
            pref_menu.smoothing.on._visible = false;
            command_bar.smoothing._alpha = 100;
        }
    }
}
//マーキー部を表示

function Show_marquee() {
    if (autopop_cm && !autopop_mode) {
        autopop_mode = true;
        // 自動CMマーキーの動作変更
        // ヘッダを透明化&最大化時に有効ならCMだけ表示
        if (design_mode != 0 && nico.isLargeScreen && transparent_header) {
            nico.header._visible = true;
        }
        if (design_mode == 0) {
            nico.header._visible = true;
            main_bar._visible = false;
            if (!nico.isLargeScreen) {
                nico.videowindow._y += 22;
                nico.controller._y += 15;
            }
        }
    }
}
//マーキー部を非表示

function Hide_marquee() {
    if (autopop_cm && autopop_mode) {
        autopop_mode = false;
        exception_cm = false;
        if (design_mode != 0 && nico.isLargeScreen && transparent_header) {
            nico.header._visible = header._visible;
        }
        if (design_mode == 0) {
            nico.header._visible = false;
            main_bar._visible = header._visible;
            if (!nico.isLargeScreen) {
                nico.videowindow._y -= 22;
                nico.controller._y -= 15;
            }
        }
    }
}
// 時報の消去用タイマーイベント

function CheckJihouEnd() {
    var jihou_pause = nico.header.marquee_base.marquees_info[nico.header.marquee_base.marquee_index].pause;
    if (jihou_pause != 1) {
        Hide_marquee();
        clearInterval(jihou_timer);
        jihou_timer = undefined;
    }
}
function quickNGIDMode(mode) {
    if (mode == "on") {
        main_bar.base.onRelease = function() {
            if (use_swf_version >= 8 && key_operation) {
                System.IME.setEnabled(false); // IMEをオフにする
            }
            var xm = main_bar._xmouse;
            if (xm > main_bar.main_info._x && xm < main_bar.main_info._x + main_bar.main_info._width) {
                var ym = main_bar._ymouse;
                if (ym > main_bar.main_info._y && ym < main_bar.main_info._y + main_bar.main_info._height) {
                    loglist_menu.add_id._visible = false;
                    cand_ng_id = deleteRepField(cand_ng_id, "user_id", false);
                    updateFilter("add_id");
                }
            }
        };
    } else if (mode == "off") {
        main_bar.base.onRelease = function() {
            if (use_swf_version >= 8 && key_operation) {
                System.IME.setEnabled(false); // IMEをオフにする
            }
        };
    }
}
//完全ローカル再生の実験
//ニュースを読み込みにいくが同一ドメインなので404が帰ってくる
//めんどうなのでつぶしてない
//他の通信はしないはず

function playLocalFLV(f) {
    showInfoOnMainBar("完全ローカルモードで再生します");
    auto_comment_post = false;
    nico.OpenPlayer(undefined, f, 12345.6789, undefined);
    playLocalXML();
}
function playLocalXML() {
    clearInterval(playLocalXML_TimerID);
    if (wx != undefined) {
        loadLocalXML2(unescape(wx));
    } else {
        var dur = nico.player._contentLength;
        //動画読み込んでduration得られるまで待つ
        if (dur == 12345.6789) {
            playLocalXML_TimerID = setInterval(playLocalXML, 100);
            return;
        } else {
            //読み込み番号の決定↓
            max_comments = Math.round(dur / 60 * 100); //5分で500 10分で1000ぐらい
            if (max_comments > limit_comments) {
                max_comments = limit_comments;
            }
            if (max_comments < 250) {
                max_comments = 250;
            }
            if (local_from == "random") {
                if (local_total_count < max_comments) {
                    local_from = 1;
                    local_to = local_total_count;
                } else {
                    local_from = Math.floor(Math.random() * (local_total_count - max_comments + 1)) + 1;
                    local_to = local_from + max_comments - 1;
                }
            } else if (local_from <= 0) {
                local_to = local_total_count + local_from;
                local_from = local_to - max_comments + 1;
            } else {
                local_to = local_from + max_comments - 1;
            }
            if (local_from < 0) {
                local_from = 1;
            }
            if (local_to < 0) {
                local_to = 1;
            }
            if (local_from > local_total_count) {
                local_from = local_total_count;
            }
            if (local_to > local_total_count) {
                local_to = local_total_count;
            }
            loadLocalXML(VIDEO, local_from, local_to);
        }
    }
}
//リンク生成

function addLink(cand_links) {
    for (var i = 0; i < cand_links.length; i++) {
        mylists_len = mylists.length;
        if (mylists_len < 3 && cand_links[i].number.indexOf("mylist/") >= 0) {
            mylists.push(cand_links[i].number);
            //↓自動リンクが先に作成されてなさそうなら、アクティブにする
            if (links[0].length == 0 && mylists_len == 0) { //自動リンクは作成されてないはず
                updateLinkTab(1, true);
                links_num = [1, 0];
                updateLinkThumb("update", links_num[0], links_num[1]);
            } else {
                updateLinkTab(mylists_len + 1, false);
            }
        } else {
            var rep_flag = false; //すでに同じリンクがないか重複チェック
            for (var j = links[0].length; j >= 0; j--) {
                if (links[0][j].number == cand_links[i].number) {
                    rep_flag = true;
                    break;
                }
            }
            if (!rep_flag) {
                if (links[0].length < max_auto_link) { //max_auto_link以下なら
                    links[0].push(cand_links[i]); //後ろに新しいの追加
                    updateLinkThumb("add", -1, -1);
                    if (show_info) {
                        showInfoOnScreen("Auto Link", 120);
                    }
                }
            }
        }
    }
}
//自動リンク検索 sm123456 am123456 fz123456
//半角のみ
/*
function searchLink(mode){
    var headers = new Array("sm","am","fz","ca");
    var cand_links = new Array();
    for (var i=0; i<headers.length; i++){
        var link = headers[i];
        var ary;
        if(mode == "tags"){ary = video_tags;}
        else if(mode == "comments"){ary = nico.MessageSlots;}
        for(var j=0; j < ary.length; j++){
            var original_mes, mes;
            if(mode == "tags"){original_mes = video_tags[j];}
            else if(mode == "comments"){original_mes = nico.MessageSlots[j]._text.text;}
            mes = original_mes;
            if(mes != ""){
                while(mes.indexOf(headers[i]) >= 0){
                    var numbers = mes.substr(mes.indexOf(headers[i])+2, 8);
                    for(var k=0; k < numbers.length; k++){
                        if(checkNum(numbers.charAt(k))){
                            link += numbers.charAt(k);
                        }
                        else{
                            break;
                        }
                    }
                    if(link.length >= 3 && link != VIDEO){
                        var rep_flag = false;//すでに同じリンクがないか重複チェック
                        for(var k=0; k<links[0].length; k++){
                            if(links[0][k].number == link){
                                rep_flag = true;
                                break;
                            }
                        }
                        if(!reg_flag){
                            for(var k=0; k<cand_links.length; k++){
                                if(cand_links[k].number == link){
                                    rep_flag = true;
                                    break;
                                }
                            }
                        }
                        if(!rep_flag){
                            if(mode == "tags"){
                                original_mes = "[タグ] " + original_mes;
                                cand_links.push({number: link, message: original_mes, status:"順番待ち"});
                            }else if(mode == "comments"){
                                for(var k=0; k<nico.Messages.length; k++){
                                    if(nico.Messages[k]._slot == j){
                                        cand_links.push({number: link, message: original_mes, user_id:fwMessages[k].user_id, status:"順番待ち"});
                                        break;
                                    }
                                }
                            }
                        }
                    }
                    link = headers[i];
                    mes = mes.substr(mes.indexOf(headers[i])+2);
                }
            }
        }
    }
    if(cand_links.length>0){return cand_links;}
    else{return undefined;}
}
*/
function searchLink(mode) {
    var cand_links = new Array();
    var ary, mes, result;
    if (mode == "tags") {
        ary = video_tags;
    }
    //if(mode == "links"){ary = owner_links;}
    if (mode == "comments") {
        ary = nico.MessageSlots;
    }
    for (var i = 0; i < ary.length; i++) {
        if (mode == "tags") {
            mes = ary[i];
        }
        //if(mode == "links"){mes = ary[i];}
        if (mode == "comments") {
            mes = ary[i]._text.text;
        }
        result = searchMessage(mes);
        if (result.length > 0) {
            cand_links = cand_links.concat(result);
        }
    }
    if (cand_links.length > 0) {
        return cand_links;
    } else {
        return undefined;
    }
}
function searchMessage(original_mes) {
    var headers = new Array("http://", "watch/", "mylist/", "sm", "am", "fz", "ca", "ax", "yo", "nm", "za", "zb", "zc", "zd", "cw", "fx", "na", "ig");
    var cand_links = new Array();
    for (var i = headers.length - 1; i >= 0; i--) {
        var mes = original_mes;
        // ニコ割表示デザインの時は、@CMを自動リンクしない
        var user_cm = (design_mode == 0 && !autopop_cm) ? 1 : mes.indexOf('@CM') * mes.indexOf('＠CM') * mes.indexOf('@ＣＭ') * mes.indexOf('＠ＣＭ');
        if (mes != "" && user_cm != 0) {
            var link = headers[i];
            var link_index = mes.indexOf(link);
            var header_len = link.length;
            var match_len;
            while (link_index >= 0) {
                if (headers[i] == "http://") {
                    for (var j = link_index + header_len, l = mes.length; j < l; j++) {
                        var c = mes.charAt(j);
                        if (checkURL(c)) {
                            link += c;
                        } else {
                            break;
                        }
                    }
                    if (link.indexOf(".nicovideo.jp/") >= 0 && (link.indexOf("watch/") >= 0 || link.indexOf("mylist/") >= 0)) {
                        link = "";
                    }
                    match_len = header_len + link.length;
                } else if (headers[i] == "watch/") {
                    link = "";
                    for (var j = link_index + header_len, l = mes.length; j < l; j++) {
                        var c = mes.charAt(j);
                        if (checkNum(c)) {
                            link += c;
                        } else {
                            break;
                        }
                    }
                    match_len = header_len + link.length;
                } else if (headers[i] == "mylist/") {
                    for (var j = link_index + header_len, l = mes.length, slash_flag = false; j < l; j++) {
                        var c = mes.charAt(j);
                        if (checkNum(c)) {
                            link += c;
                        } else if (!slash_flag && c == '/') {
                            link += c;
                            slash_flag = true;
                        } else {
                            break;
                        }
                    }
                    match_len = link.length;
                } else {
                    for (var j = link_index + header_len, l = mes.length; j < l; j++) {
                        var c = mes.charAt(j);
                        if (checkNum(c)) {
                            link += c;
                        } else {
                            break;
                        }
                    }
                    match_len = link.length;
                }
                if (match_len > header_len && link != VIDEO) {
                    var rep_flag = false; //すでに同じリンクがないか重複チェック
                    for (var j = cand_links.length; j >= 0; j--) {
                        if (cand_links[j].number == link) {
                            rep_flag = true;
                            break;
                        }
                    }
                    if (!rep_flag) {
                        cand_links.push({
                            number: link,
                            message: original_mes,
                            user_id: undefined,
                            status: "順番待ち"
                        });
                    }
                }
                mes = mes.substr(link_index + match_len);
                link = headers[i];
                link_index = mes.indexOf(link);
            }
        }
    }
    if (cand_links.length > 0) {
        return cand_links;
    } else {
        return undefined;
    }
}
//ローカル再生
//ものすごい適当にそれっぽいのを並べてみただけ
//function tryToPlayCache(){
//  var url = local_server_name[local_server_num] + VIDEO + ".flv";
//  nico.player.load(url,120);
//ClearLog();
//nico.OpenInput();
//nico.connectBoard(true);
//  nico.player.play();
//  showInfoOnScreen(url, 120);
//}
//動画のダウンロード

function downloadFLV() {
    if (copy_title) {
        if (file_name.length > 0) {
            System.setClipboard(file_name);
            showInfoOnMainBar("動画タイトルをコピーしました");
        } else if (use_javascript) {
            showInfoOnMainBar("動画タイトルを取得できませんでした");
        }
    }
    if (local_file_found) {
        if (download_blank) {
            //if (use_javascript) {
            //  doJavaScript("window.open('" + local_server_name[local_server_num] + local_file_name + "', '_blank');");
            //} else {
            getURL(local_server_name[local_server_num] + local_file_name, '_blank');
            //}
        } else {
            //if (use_javascript) {
            //  doJavaScript("location.href = '" + local_server_name[local_server_num] + local_file_name + "';");
            //} else {
            getURL(local_server_name[local_server_num] + local_file_name);
            //}
        }
    } else {
        if (download_blank) {
            //if (use_javascript) {
            //  doJavaScript("window.open('" + nico.o.url + "', '_blank');");
            //} else {
            getURL(nico.o.url, '_blank');
            //}
        } else {
            //if (use_javascript) {
            //  doJavaScript("location.href = '" + nico.o.url + "';");
            //} else {
            getURL(nico.o.url);
            //}
        }
        setDownLoadInterval(200);
    }
}
/*
//XMLのダウンロード
function downloadXML(){

    function connectBoard(update, wayback) {
      if (!ready_ownerthread && has_owner_thread) {
        connectBoard_ownerthread();
        return undefined;
      }
      if (owner_thread_edit_mode) {
        return undefined;
      }
      if (MsgGetNow && last_resno > 0) {
        now_wayback_time = undefined;
        AddSystemMessage('コメント取得中のため、処理が中断されました。');
        return undefined;
      }
      if (update && !Connection.isHttp()) {
        return undefined;
      }
      var v1 = -100;
      if (mm) {
        v1 = -1000;
      } else {
        if (ContentLength >= 60) {
          v1 = -250;
          if (ContentLength >= 300) {
            v1 = -500;
            if (ContentLength >= 600) {
              v1 = -1000;
            }
          }
        }
      }
      resMax = Math.abs(v1);
      if (!NoMessages && Messages.length > 0 && !wayback) {
        v1 = Number(Messages[Messages.length - 1]._no) + 1;
      }
      ThreadTicket = undefined;
      closeInterval();
      inputArea.ChatSendButton._visible = false;
      if (buttonMessageSlots) {
        buttonMessagesEnabledCheck();
      }
      if (!update) {
        MsgGetNow = true;
        tabmenu.enabled = false;
        inputArea.enabled = false;
      }
      if (!wayback) {
        WaybackKey = undefined;
        wayback_time = undefined;
      }
      if (!sendCMsgGetThread_Time) {
        sendCMsgGetThread_Time = getTimer();
      }
      Connection.SendCMsgGetThread(CurrentThreadID, NiwavidePacket.NIWAVIDE_PACKET_VERSION, v1, WaybackKey, wayback_time, UserID, nocompress);
    }

    function connectBoard_ownerthread() {
      if (!sendCMsgGetThreadOwner_Time) {
        sendCMsgGetThreadOwner_Time = getTimer();
      }
      Connection.SendCMsgGetThread(CurrentThreadID, NiwavidePacket.NIWAVIDE_PACKET_VERSION, OWNERTHREAD_MAX, undefined, undefined, UserID, nocompress, NiwavidePacket.FORK_OWNER);
    }
        v2.SendCMsgGetThread = function (threadid, version, resfrom, waybackkey, when, user, nocompress, fork, adminkey, force184) {
          var v3 = new XML();
          var v2 = v3.createElement('thread');
          if (threadid != undefined) {
            v2.attributes.thread = threadid;
          }
          if (version != undefined) {
            v2.attributes.version = version;
          }
          if (resfrom != undefined) {
            v2.attributes.res_from = resfrom;
          }
          if (waybackkey != undefined) {
            v2.attributes.waybackkey = waybackkey;
          }
          if (when != undefined) {
            v2.attributes.when = when;
          }
          if (user != undefined) {
            v2.attributes.user_id = user;
          }
          if (nocompress != undefined) {
            v2.attributes.no_compress = nocompress;
          }
          if (fork != undefined) {
            v2.attributes.fork = fork;
          }
          if (adminkey != undefined) {
            v2.attributes.adminkey = adminkey;
          }
          if (force184 != undefined) {
            v2.attributes.force_184 = force184;
          }
          v3.appendChild(v2);
          this.SendXml(v3);
        };
        v2.SendXml = function (xml) {
          if (this.bufferingLevel != 0) {
            this.XMLBuffer.appendChild(xml.firstChild);
          } else {
            this.SendXmlLower(xml);
          }
        };

        v2.SendXmlLower = function (xml) {
          var v2 = xml.toString();
          if (!this.httpConnection && !this.connected) {
            this.SendBuffer += v2;
            if (!this.connecting) {
              this.DoConnect();
            }
          } else {
            if (this.httpConnection) {
              this.connecting = true;
              xml.sendAndLoad(this.serverHost, this.httpReceiver);
            } else {
              this.xmlsocket.send(v2);
            }
            if (this.onSend != undefined) {
              this.onSend(xml);
            }
          }
        };
        v2.DoConnect = function () {
          if (this.httpConnection) {
            return undefined;
          }
          if (!this.connecting && !this.connected) {
            this.connecting = true;
            if (this.onConnecting != undefined) {
              this.onConnecting(this.serverHost, this.serverPort);
            }
            this.xmlsocket.connect(this.serverHost, this.serverPort);
          }
        };
    var fileRef = new flash.net.FileReference();
    var fileListener = new Object();
    fileListener.onSelect = function(file) {
        // 参照・保存ダイアログで開く・保存を選択したときの処理
        showInfoOnMainBar('onSelect: ' + file.name);
    };
    fileListener.onCancel = function(file) {
        // 参照・保存ダイアログでキャンセルを選択したときの処理
        showInfoOnMainBar('onCancel: ' + file.name);
    };
    fileListener.onOpen = function(file) {
        // ダウンロード開始時の処理
        showInfoOnMainBar('onOpen: ' + file.name);
    };
    fileListener.onProgress = function(file, nLoadedBytes, nTotalBytes) {
        // ダウンロード中の処理
        showInfoOnMainBar('onProgress' + file.name);
    };
    fileListener.onComplete = function(file) {
        // ダウンロード完了時の処理
        showInfoOnMainBar('onComplete: ' + file.name);
    };
    fileListener.HTTPError = function(file) {
        // 入出力エラーでダウンロード失敗時の処理
        showInfoOnMainBar('onHTTPError: ' + file.name);
    };
    fileListener.onIOError = function(file) {
        // 入出力エラーでダウンロード失敗時の処理
        showInfoOnMainBar('onIOError: ' + file.name);
    };
    fileListener.onSecurityError = function(file, error) {
        // セキュリティエラーでダウンロード失敗時の処理
        showInfoOnMainBar('onSecurityError: '+ error);
    };
    fileRef.addListener(fileListener);
    fileRef.download(_url, VIDEO + "." + movie_type);
}
*/
//残りcheck_repeat_threshold秒を切ったらタイマー設置

function checkRepeat() {
    var loaded_bytes = nico.player.stream_ns.bytesLoaded;
    if (loaded_bytes < 100000) {
        return;
    }
    var now = nico.player.__get__playheadTime();
    var last = nico.player._contentLength;
    if (end_time > 0) {
        last = end_time;
    }
    //  if (last < now && last != 0){
    //      auto_repeat_status = "start";
    //      startRepeat();
    //      return;
    if (last - now < check_repeat_threshold && last != 0) {
        //タイマー起動(なんとなく0.5秒ほど遅らせる)
        auto_repeat_status = "start";
        repeat_timerID = setInterval(startRepeat, (((last - now) * 1000) | 0) + 500);
        return;
    }
}
//リピート再生のスタート処理

function startRepeat() {
    clearInterval(repeat_timerID);
    auto_repeat_status = "ready";
    if (auto_repeat) {
        var now = nico.player.__get__playheadTime();
        if (now < 1) { //デフォのくりかえし機能が先に発動してしまったっぽい場合
            if (show_info) {
                showInfoOnScreen("Repeat-", 120);
            }
        } else {
            nico.player.__set__playheadTime(0);
            setCheckPlayingInterval();
            if (show_info) {
                if (end_time > 0) {
                    showInfoOnScreen("Repeat+", 120);
                } else {
                    showInfoOnScreen("Repeat", 120);
                }
            }
        }
    }
}
//field_nameでソート(sortOn(field_name,16))されたsorted_aryから文字列sを探し出す
//sorted_ary[n][field_name] == sならnを返す
//みつからない場合は-1を返す

function binarySearch(sorted_ary, field_name, s) {
    var high = sorted_ary.length - 1;
    var low = 0;
    var mid = (((low + high) / 2) | 0);
    var result_num = -1;
    while (high >= low) {
        if (s == sorted_ary[mid][field_name]) {
            result_num = mid;
            break;
        }
        //      var tmp_ary = new Array({tmp:s},{tmp:sorted_ary[mid][field_name]});
        //      tmp_ary.sortOn("tmp",16);
        //      if(tmp_ary[0].tmp == s){
        //sortOn(field_name,16)されてるなら、↑みたいにしなくて
        //↓みたいにstring1 < string2とかやっても問題ないようだ
        if (s < sorted_ary[mid][field_name]) {
            high = mid - 1;
        } else {
            low = mid + 1;
        }
        mid = (((low + high) / 2) | 0);
    }
    return result_num;
}
//binarySearchの検索結果が複数あるかもしれない版
//結果は配列で返されるので、みつからない場合は配列.length==0で判断できる
//numが一つしかない、もしくはnumの有無を確認したいだけなら、こっちを使う必要はない

function binarySearchS(sorted_ary, field_name, s) {
    var result_num = binarySearch(sorted_ary, field_name, s);
    var result_ary = new Array();
    if (result_num != -1) {
        var i = result_num - 1;
        while (sorted_ary[i][field_name] == s) {
            result_ary.unshift(i);
            i--;
        }
        i = result_num;
        while (sorted_ary[i][field_name] == s) {
            result_ary.push(i);
            i++;
        }
    }
    return result_ary;
}
//渡された配列のfield_nameの重複を削除して配列を返す
//field_nameの数値の小さい順に並べて返される
//sort_status=trueならすでにソートされているものとして扱う

function deleteRepField(ary, field_name, sort_status) {
    if (!sort_status) {
        ary.sortOn(field_name, 16);
    }
    var result_ary = new Array();
    if (ary.length > 0) {
        result_ary.push(ary[0]);
        for (var i = 1; i < ary.length; i++) {
            if (ary[i][field_name] != ary[i - 1][field_name]) {
                result_ary.push(ary[i]);
            }
        }
    }
    return result_ary;
}
//NGIDの各種削除処理
//sort_status=trueならすでにdateの大きい順にソートされているものとして扱う
//最終的にdateフィールドの大きい順にならべた配列を返す(はず)

function deleteExpID(ary, sort_status) {
    if (!sort_status) {
        ary.sortOn("date", 16 | 2); //dateの数値の大きい順
    }
    var result_ary = ary.slice();
    if (max_ng_id > 0) {
        if (result_ary.length > max_ng_id) { //NGIDが規定数を超えていたら
            while (result_ary.length > max_ng_id) {
                result_ary.pop(); //はみでたお尻のヤツを削除
            }
        }
    }
    if (ng_id_expires > 0) {
        var myDate = new Date();
        var now = myDate.getTime();
        for (var i = result_ary.length - 1; i >= 0; i--) {
            if (now - result_ary[i].date >= ng_id_expires * (24 * 60 * 60 * 1000)) { //期限切れを削除
                result_ary.pop();
            } else {
                break;
            }
        }
    }
    return result_ary;
}

function deleteExpKakikomi(ary, sort_status) {
    if (!sort_status) {
        ary.sortOn("date", 16 | 2); //dateの数値の大きい順
    }
    var result_ary = ary.slice();
    if (max_kaki_komi > 0) {
        if (result_ary.length > max_kaki_komi) { //kakikomiが規定数を超えていたら
            while (result_ary.length > max_kaki_komi) {
                result_ary.pop(); //はみでたお尻のヤツを削除
            }
        }
    }
    if (kaki_komi_expires > 0) {
        var myDate = new Date();
        var now = myDate.getTime();
        for (var i = result_ary.length - 1; i >= 0; i--) {
            if (now - result_ary[i].date >= kaki_komi_expires * (24 * 60 * 60 * 1000)) { //期限切れを削除
                result_ary.pop();
            } else {
                break;
            }
        }
    }
    return result_ary;
}
//文字列sのold_keyをnew_keyに入れ替える
//複数keyを削除したい場合はold_keyに配列を渡す
//new_key=""にすれば、単純な文字削除に使える

function replaceSentence(s, old_key, new_key) {
    var ary = new Array();
    if (typeof(old_key) == "object") {
        for (var i = 0; i < old_key.length; i++) {
            ary = s.split(old_key[i]);
            s = ary.join(new_key);
        }
    } else if (typeof(old_key) == "string") {
        ary = s.split(old_key);
        s = ary.join(new_key);
    }
    return s;
}
//文字列s1とs2がどの程度類似しているか、すごい適当な判定
//似たようなコメントを投下しつづける荒らしIDの判定に使おうかと思いつつ
//職人のコメントにモロに誤爆するので見送り

function compareSentence(s1, s2) {
    var shortSt, longSt;
    if (s1.length >= s2.length) {
        shortSt = s2;
        longSt = s1;
    } else {
        shortSt = s1;
        longSt = s2;
    }
    var count = 0;
    for (var i = 0; i < shortSt.length; i++) {
        var pos = longSt.indexOf(shortSt.substr(i, 1));
        if (pos >= 0) {
            longSt = longSt.substring(0, pos - 1) + longSt.substring(pos + 1);
            count++;
        }
    }
    var rate = Math.round(count / shortSt.length * 100);
    return rate;
}
//こんな方法でいいのか数字判定

function checkNum(s) {
    if (s == "" || s == undefined) {
        return false;
    }
    s = s.toString();
    var result = true;
    for (var i = 0; i < s.length; i++) {
        if (s.charCodeAt(i) < 48 || s.charCodeAt(i) > 57) {
            result = false;
            break;
        }
    }
    return result;
}
//適当にURI判定

function checkURL(s) {
    if (s == "" || s == undefined) {
        return false;
    }
    s = s.toString();
    var result = false;
    for (var i = 0; i < s.length; i++) {
        if (s.charCodeAt(i) == 0x23 || (s.charCodeAt(i) >= 0x25 && s.charCodeAt(i) <= 0x26) || s.charCodeAt(i) == 0x2b || (s.charCodeAt(i) >= 0x2d && s.charCodeAt(i) <= 0x3a) || s.charCodeAt(i) == 0x3d || (s.charCodeAt(i) >= 0x3f && s.charCodeAt(i) <= 0x5a) || s.charCodeAt(i) == 0x5f || (s.charCodeAt(i) >= 0x61 && s.charCodeAt(i) <= 0x7a) || s.charCodeAt(i) == 0x7e) {
            result = true;
            break;
        }
    }
    return result;
}
//flvplayer_containerの高さ変更
//オミトロンのフィルターでやるようにした（高さ調節のため復帰）

function JS_setFLVPlayerSize() {
    var tmp = 510;
    var javascript_command = "
        var h = \$('flvplayer_container').style.height;
        if(h != '" + tmp + "px') {
            \$('flvplayer_container').style.height = \$('flvplayer').style.height =　'" + tmp + "px';}
    ";
    doJavaScript(javascript_command);
}
function JS_getTitle() {
    var javascript_command = "
        var w = window;
        var title = decodeURI(w.Video.title);
        document.getElementById('flvplayer').SetVariable('video_title',title);
    ";
    doJavaScript(javascript_command);
}
//javascriptで登録タグをvideo_tagsに入れてもらう
//video_tagsに入れられるまでちょっと時間がかかる

function JS_getVideoTags() {
    /*var javascript_command = "
        var vtag = document.getElementById('video_tags');
        var vtags = vtag.firstChild.firstChild;
        var i=0,j=0;
        while(i<22 && vtags != undefined){
            if(vtags.hasChildNodes()){
                document.getElementById('flvplayer').SetVariable('video_tags.'+j,vtags.firstChild.nodeValue);
                j++;
            }
            vtags = vtags.nextSibling;
            i++;
        }
        document.getElementById('flvplayer').SetVariable('video_tags_status','ready');
    ";*/
    var javascript_command = "
        var fp = document.getElementById('flvplayer');
        var atags = document.getElementsByTagName('a');
        var j=0;
        for(var i=0; i<atags.length; i++){
            if(atags[i].hasChildNodes()){
                var value = atags[i].getAttribute('href');
                if(value.match(/tag\\\/.*([a-z]{2}[0-9]+).*/)){
                    fp.SetVariable('video_tags.'+j, RegExp.$1);
                    j++;
                }
            }
        }
        fp.SetVariable('video_tags_status', 'ready');
    ";
    doJavaScript(javascript_command);
}
//JavaScriptでマイリストっぽいのをに入れてもらう
//うｐ主のコメント欄の判定が面倒なので、
//どうせ読み込み時に1回しか処理しないし<a>タグを総当り
//              var value = atags[i].firstChild.nodeValue;

function JS_getMyLists() {
    /*var javascript_command = "
        var fp = document.getElementById('flvplayer');
        var atags = document.getElementsByTagName('a');
        var j=0;
        var k=0;
        for(var i=0; i<atags.length; i++){
            if(atags[i].hasChildNodes()){
                var value = atags[i].getAttribute('href');
                if(value.match(/mylist\\\/[0-9]+/)){
                    fp.SetVariable('mylists.'+j, value);
                    j++;
                }
                if(value.match(/nicovideo.jp\\\/watch\\\/..[0-9]+/)){
                    fp.SetVariable('owner_links.'+k, value);
                    k++;
                }
            }
        }
        fp.SetVariable('mylists_status', 'ready');
    ";*/
    var javascript_command = "
        var fp = document.getElementById('flvplayer');
        var atags = document.getElementsByTagName('a');
        var j=0;
        for(var i=0; i<atags.length; i++){
            if(atags[i].hasChildNodes()){
                var value = atags[i].getAttribute('href');
                if(value.match(/mylist\\\/[0-9]+/)){
                    fp.SetVariable('mylists.'+j, value);
                    j++;
                }
            }
        }
        fp.SetVariable('mylists_status', 'ready');
    ";
    doJavaScript(javascript_command);
}
//getNextHighestDepthがなんだかうまく使えないので
//window_aryのインスタンスの順番を変えずに、指定のインスタンスを最上部にもってくる

function goTopDepth(path) {
    var window_ary = new Array("pref_menu", "ngid_menu", "kakikomi_menu", "link_thumb", "command_bar", "hide_bar");
    var depth_ary = new Array();
    for (var i = 0; i < window_ary.length; i++) { //ウィンドウの深度を得る
        if (_root[window_ary[i]] != undefined) {
            depth_ary.push({
                name: window_ary[i],
                depth: _root[window_ary[i]].getDepth()
            });
        }
    }
    depth_ary.sortOn("depth", 16); //深度の深い順に
    var window_found = false;
    for (var i = 0; i < depth_ary.length; i++) {
        if (window_found) {
            path.swapDepths(_root[depth_ary[i].name]);
        }
        if (path._name == depth_ary[i].name) {
            window_found = true;
        }
    }
};
//おもにデバッグ用

function doJavaScript(s) { //デバック
    if (use_javascript) {
        if (useswfversion >= 8 && flash.external.ExternalInterface.available) {
            s = replaceSentence(s, '\\\\', '\\\\\\\\'); // evalをかます分エスケープ（'\'→'\\'）する
            return flash.external.ExternalInterface.call("eval", s);
        } else {
            getURL("javascript:" + s + ";void(0);");
        }
    } else {
        return undefined;
    }
}
//デバッグ用　JSでalertだす Operaだとマルチバイト文字は化ける

function alert_js(s) {
    if (use_javascript) {
        doJavaScript("alert('" + s + "');");
    } else {
        return undefined;
    }
}
//デバッグ用　JSでmylist_add_statusのところ書き換え Operaだとマルチバイト文字は化ける

function mylist_js(s, plus) {
    if (use_javascript) {
        if (plus) {
            doJavaScript("document.getElementById('mylist_add_status').innerHTML += '" + s + "';");
        } else {
            doJavaScript("document.getElementById('mylist_add_status').innerHTML = '" + s + "';");
        }
    } else {
        return undefined;
    }
}
//タイムライン？というかタイマー？
//こんなやり方正しいのかどうか知らないが・・
//getflvするにしろrepeatするにしろMessagesの更新にしろ
//flvplayer書き換えとかやると本家バージョンアップの時のチェックが面倒すぎるので
//onEnterFrameいっぱいつくって定期的に監視しつつ、いらなくなったらdeleteするのが楽でいい気がする
createEmptyMovieClip("timeLine", 30000);
//flvplayer読み込みからgetflv開始までの監視用
timeLine.createEmptyMovieClip("getflv", 1);
timeLine.getflv.onEnterFrame = function() {
    if (getflv_status == "ready") {
        var total = nico.getBytesTotal();
        var loaded = nico.getBytesLoaded();
        if (total > 0 && total == loaded && nico.isStartupPlayer) { //flvplayer.swfの読み込み終了
            replaceFunction(); //いくつかのfunctionを上書きしてしまう
            //レイアウト変更等が終わったので表示
            //プレミアムの自動再生をいじれるように。
            nico.System_menu.autoPlayCheckBox.enabled = true;
            nico.System_menu.autoPlayPremiumText._visible = false;
            nico.tabmenu.adView._visible = false; //広告を消す。
            nico.System_menu.marqueeSkipCheckBox.enabled = true;
            //保存用を元の値に上書き
            if (marquee_skip) {
                nico.marqueeSkip_so.data.flag = true;
                nico.System_menu.marqueeSkipCheckBox.selected = true;
                nico.marqueeSkip_so.flush();
            } else {
                nico.marqueeSkip_so.data.flag = flase;
                nico.System_menu.marqueeSkipCheckBox.selected = false;
                nico.marqueeSkip_so.flush();
            }
            _root._visible = true;
            nico._visible = true;
            nico.AddSystemMessage('wrapper: ' + version);
            nico.AddSystemMessage('Flash  : ' + flash_info);
            if (movie_type == 'mp4' && !detectFlashVer(9, 0, 115) && !eco) {
                var mes = 'この動画を視聴するためにはFlashPlayerをバージョンアップする必要があります。\n<CENTER><U><FONT color=\'#0000FF\'><A href=\'http://www.adobe.com/shockwave/download/index.cgi?Lang=Japanese&P1_Prod_Version=ShockwaveFlash\'>最新のFlashPlayerをダウンロードする</A></FONT></U></CENTER>\n\n';
                if (iee) {
                    mes += 'なおエコノミーモードであれば今すぐ視聴することが可能です。\n<CENTER><U><FONT color=\'#0000FF\'><A href=\'' + nico.U + 'watch/' + wv_id + '?eco=1\'>エコノミーモードで閲覧する</A></FONT></U></CENTER>\n\n';
                }
                nico.showWindow(nico.getSystemMessage('動画再生エラー', 'playerUpdateDialog', mes, true));
            } else {
                if (wv != undefined) {
                    playLocalFLV(unescape(wv));
                    header.icon_local._visible = true;
                    header.icon_narrow._visible = false;
                } else {
                    setAutoRepeatInterval();
                    //setAutoLinkInterval();
                    setAutoCommentPostInterval();
                    nico.v = VIDEO;
                    nico.ad = AD;
                    if (US != undefined) {
                        nico.us = US;
                    }
                    nico.getVideo(VIDEO);
                }
                getflv_status = "done";
            }
            delete this.onEnterFrame; //もういらないので消去
        }
    }
};
//IE6だと順番に実行しないとダメだった
//めんどうなのでチェックしないで10フレームおきに順番に盲目的に実行
timeLine.createEmptyMovieClip("check_html", 11);

function checkHTML() {
    var limit_interval = 1800; //最大で何フレーム待つか
    if (video_tags_status == "waiting") {
        video_tags_status = "loading";
        JS_getVideoTags();
    }
    timeLine.check_html.onEnterFrame = function() {
        var loading = false;
        limit_interval--;
        if (check_interval % 10 == 0) {
            if (limit_interval < 0) {
                check_html_status = "waiting";
                delete this.onEnterFrame;
            }
            if (video_tags_status == "ready" && mylists_status == "waiting") {
                var cand_links = searchLink("tags");
                if (cand_links != undefined) {
                    addLink(cand_links);
                }
                mylists_status = "loading";
                JS_getMyLists();
            }
            if (mylists_status == "ready") {
                //var cand_links = searchLink("links");
                //if(cand_links != undefined){
                //  addLink(cand_links);
                //}
                if (mylists.length > 0) {
                    //main_bar.link._visible = true;
                    for (var i = 2; i >= 0; i--) {
                        if (mylists[i] != undefined) {
                            updateLinkTab(i + 1, false);
                        }
                    }
                    //↓自動リンクが先に作成されてなさそうなら、アクティブにする
                    if (links[0].length == 0) { //自動リンクは作成されてないはず
                        updateLinkTab(1, true);
                        links_num = [1, 0];
                        updateLinkThumb("update", links_num[0], links_num[1]);
                    }
                }
                check_html_status = "ready";
                delete this.onEnterFrame;
            }
        }
    };
}
timeLine.createEmptyMovieClip("check_title", 15);

function checkTitle() {
    var limit_interval = 300; //最大で何フレーム待つか
    JS_getTitle();
    timeLine.check_title.onEnterFrame = function() {
        limit_interval--;
        if (check_interval % 10 == 0) {
            if (video_title.length > 0) {
                delete this.onEnterFrame;
                if (nico.o.url.substr(nico.o.url.length - 3, 3) == 'low') {
                    if (nico.input_term > 0) {
                        video_title += '（試聴モード）';
                    } else {
                        video_title += '（エコノミーモード）';
                    }
                }
                file_name = video_title;
                for (var i = 0; i < file_name.length; i++) {
                    var c = file_name.charAt(i);
                    if (c != ' ' && c != '　' && c != '\t' && c != '\r' && c != '\n') {
                        break;
                    }
                }
                for (var j = file_name.length - 1; j >= 0; j--) {
                    var c = file_name.charAt(j);
                    if (c != ' ' && c != '　' && c != '\t' && c != '\r' && c != '\n') {
                        break;
                    }
                }
                file_name = file_name.substring(i, j + 1);
                file_name = replaceSentence(file_name, '?', '？');
                file_name = replaceSentence(file_name, '"', '”');
                file_name = replaceSentence(file_name, '/', '／');
                file_name = replaceSentence(file_name, '\\\\', '￥');
                file_name = replaceSentence(file_name, '<', '＜');
                file_name = replaceSentence(file_name, '>', '＞');
                file_name = replaceSentence(file_name, '*', '＊');
                file_name = replaceSentence(file_name, '|', '｜');
                file_name = replaceSentence(file_name, ':', '：');
                file_name = replaceSentence(file_name, ',', '，');
                file_name = replaceSentence(file_name, ';', '；');
                check_title_status = "ready";
                downloadFLV();
            }
            if (limit_interval < 0) {
                delete this.onEnterFrame;
                check_title_status = "waiting";
                downloadFLV();
            }
        }
    };
}
//自動コメントアイコン回転用
timeLine.createEmptyMovieClip("auto_comment_icon_rotate", 20);

function autoCommentPostIconRotate(mode) {
    if (mode == "start") {
        timeLine.auto_comment_icon_rotate.onEnterFrame = function() {
            main_bar.auto_comment_icon._rotation += 10;
        };
    }
    if (mode == "stop") {
        delete timeLine.auto_comment_icon_rotate.onEnterFrame;
        main_bar.auto_comment_icon._rotation = 0;
    }
}
//スクリーン情報消すまでの監視　showInfoOnScreen内で使用
timeLine.createEmptyMovieClip("info_on_screen", 30);

function setShowInfoOnScreenInterval(num) {
    var interval = num; //numフレーム後に消す
    timeLine.info_on_screen.onEnterFrame = function() {
        interval--;
        if (interval < 0) {
            screen.wrapper_info._visible = false;
            interval = undefined;
            delete this.onEnterFrame;
        }
    };
}
//シーク先で再生状態になっているか監視(マウスホイールとかリピートとかで)
timeLine.createEmptyMovieClip("check_playing", 40);

function setCheckPlayingInterval() {
    var interval = 15;
    timeLine.check_playing.onEnterFrame = function() {
        interval--;
        //if(interval % 10 == 0){
        if (!nico.player.isSeeking) {
            var state = nico.player.__get__state();
            if (state == "paused") {
                nico.player.play();
            }
            //else if(state == "seeking"){
            //  nico.player.play();
            //  interval = -1;
            //}else if((state == "end" || state == "buffering") && nico.player.__get__playheadTime() >= nico.player._contentLength - 1){
            //  interval = undefined;
            //  delete this.onEnterFrame;
            //}
            interval = undefined;
            delete this.onEnterFrame;
        }
        if (interval < 0) {
            interval = undefined;
            delete this.onEnterFrame;
        }
    };
}
//リピート終点入力時のシークバーによる時間入力監視
timeLine.createEmptyMovieClip("end_time_input", 50);

function setEndTimeInputInterval() {
    timeLine.end_time_input.onEnterFrame = function() {
        if (check_interval % 10 == 0) {
            end_time_input.window.now.text = nico.player.__get__playheadTime();
            end_time_input.window.now.setTextFormat(black14b_fmt);
            end_time_input.window.now._x = -100 - end_time_input.window.now._width;
        }
        if (end_time_input == undefined) {
            delete this.onEnterFrame;
        }
    };
}
//リピート監視
timeLine.createEmptyMovieClip("auto_repeat", 60);

function setAutoRepeatInterval() {
    timeLine.auto_repeat.onEnterFrame = function() {
        if (check_interval % 30 == 0) {
            if (auto_repeat && auto_repeat_status == "ready") {
                checkRepeat();
            } else if (!auto_repeat) {
                delete this.onEnterFrame;
            }
        }
    };
}
//UpdateMessagesで監視するようにしたので廃止
/*
//自動リンク監視
timeLine.createEmptyMovieClip("auto_link",70);
function setAutoLinkInterval(){
    timeLine.auto_link.onEnterFrame = function(){
        if(check_interval % 60 == 0){
            if(auto_link && links.length <= max_auto_link-1){
                var cand_links = searchLink("comments");
                if(cand_links != undefined){
                    addLink(cand_links);
                }
            }else{
                delete this.onEnterFrame;
            }
        }
    };
}
*/
//自動コメント収集監視
timeLine.createEmptyMovieClip("auto_comment_post", 80);

function setAutoCommentPostInterval() {
    timeLine.auto_comment_post.onEnterFrame = function() {
        if (check_interval % 60 == 0) {
            if (auto_comment_post) {
                if (auto_comment_status == "ready") {
                    if (getflv_status == "done") {
                        if (local_last_no < fwMessages[fwMessages.length - 1]._no) {
                            sendLocalXML();
                        }
                    }
                }
            } else {
                delete this.onEnterFrame;
            }
        }
    };
}
//自動コメント取得禁止
//2箇所書き換えるのがめんどうなので・・・
//ThreadIntervalIDを監視する
timeLine.createEmptyMovieClip("auto_comment_get", 90);
var last_clear_time = 0;
clearThreadIntervalID();

function clearThreadIntervalID() {
    timeLine.auto_comment_get.onEnterFrame = function() {
        if (check_interval % 60 == 0) {
            if (!auto_comment_get) {
                if (nico.ThreadIntervalID != undefined) {
                    nico.closeInterval();
                }
                //          }else{
                //              delete this.onEnterFrame;
            }
        }
    };
}
//ダウンロードボタンを消す
timeLine.createEmptyMovieClip("download", 100);

function setDownLoadInterval(num) {
    var interval = num;
    main_bar.download._visible = false;
    timeLine.download.onEnterFrame = function() {
        interval--;
        if (interval < 0) {
            main_bar.download._visible = true;
            interval = undefined;
            delete this.onEnterFrame;
        }
    };
}
//サムネの読み込みリトライ
//buffer_aryを定期的に監視して、サムネが入ってたらloading_aryに移し変えて読み込みする
//buffer_ary{list_num, thumb_num, url, timeout1, timeout2, retry, status}
//404なのかサーバーが重くてエラーなのかの判定をしていないので
//404でもキッチリretry_count回数接続しにいくのが難点
timeLine.createEmptyMovieClip("get_thumb", 120);
timeLine.get_thumb.onEnterFrame = function() {
    if (check_interval % 10 == 0) {
        var max_connection = 5; //最大同時接続数
        var retry_count = 3; //リトライ回数
        var timeout1 = 3; //タイムアウト(ほぼ秒) getBytesTotal==-1がこれだけ続くとエラーと判定
        var timeout2 = 60; //タイムアウト(ほぼ秒) getBytesTotal==0がこれだけ続くともう止める
        if (loading_ary.length < max_connection && buffer_ary.length > 0) {
            loading_ary.push(buffer_ary[0]);
            buffer_ary.splice(0, 1);
        }
        if (loading_ary.length == 0) {
            return;
        }
        for (var i = 0; i < loading_ary.length; i++) {
            var l_num = loading_ary[i].list_num;
            var t_num = loading_ary[i].thumb_num;
            var thumb_window = link_thumb["thumb" + l_num + "_" + t_num];
            if (loading_ary[i].status == "ready") {
                thumb_window.createEmptyMovieClip("thumb", 1);
                if (useswfversion >= 7) {
                    var thumb_mcl = new MovieClipLoader();
                    thumb_mcl.loadClip(loading_ary[i].url, thumb_window.thumb);
                } else {
                    thumb_window.thumb.loadMovie(loading_ary[i].url);
                }
                loading_ary[i].status = "loading";
                links[l_num][t_num].thumb_status = "読み込み中 " + (loading_ary[i].retry + 1) + "回目";
                updateLinkThumb("update", links_num[0], links_num[1]);
            }
            var total = thumb_window.thumb.getBytesTotal();
            var loaded = thumb_window.thumb.getBytesLoaded();
            //↓エラーっぽい場合
            if (total < 0) {
                loading_ary[i].timeout1 += 1;
                if (loading_ary[i].timeout1 > timeout1 * 60 / 10) {
                    loading_ary[i].timeout1 = 0;
                    loading_ary[i].timeout2 = 0;
                    loading_ary[i].retry += 1;
                    if (loading_ary[i].retry >= retry_count) {
                        links[l_num][t_num].thumb_status = "読み込み失敗";
                        updateLinkThumb("update", links_num[0], links_num[1]);
                        loading_ary.splice(i, 1);
                        i--;
                    } else {
                        thumb_window.thumb.removeMovieClip();
                        loading_ary[i].status = "ready";
                        links[l_num][t_num].thumb_status = "順番待ち";
                        updateLinkThumb("update", links_num[0], links_num[1]);
                    }
                }
                //↓読み込みされたっぽいサムネの処理
            } else if (total > 0 && total == loaded) {
                links[l_num][t_num].thumb_status = "";
                updateLinkThumb("update", links_num[0], links_num[1]);
                loading_ary.splice(i, 1);
                i--;
                //↓返答待ちっぽいサムネの処理
            } else {
                loading_ary[i].timeout2 += 1;
                if (loading_ary[i].timeout2 > timeout2 * 60 / 10) {
                    links[l_num][t_num].thumb_status = "読み込み失敗(なんか変です)";
                    updateLinkThumb("update", links_num[0], links_num[1]);
                    loading_ary.splice(i, 1);
                    i--;
                }
            }
        }
    }
};
//<title>タグをいろいろいじる
timeLine.createEmptyMovieClip("change_title", 130);
var bytes_ary = new Array();
var total_bytes_backup = 0;
timeLine.change_title.onEnterFrame = function() {
    var titleJSCom = "document.getElementsByTagName('h1')[0].firstChild.firstChild.nodeValue";
    if (!change_title) {
        delete this.onEnterFrame;
        return;
    }
    /*swf動画だったらタイトルはいじらない*/
    if (nico.isShiSwfPlayer()) {
        delete this.onEnterFrame;
        return;
    }
    if (check_interval % 60 == 0) {
        //動画に接続できなかったと思われる
        //bytesTotalやbytesLoadedからは識別不能っぽいので
        if (nico.player.dummy_active) {
            delete this.onEnterFrame;
            doJavaScript("document.title = 'Error?';");
            if (test_mode) {
                locationReload(30);
            }
            return;
        }
        var total = nico.player.stream_ns.bytesTotal; //動画全体のbyte
        var now = nico.player.stream_ns.bytesLoaded; //読み込んだ合計のbyte
        var go_flag = false; //最後まで止まらずに再生の可否
        var checkDate = new Date();
        var checkTime = checkDate.getTime();
        if (total_bytes_backup < total) {
            total_bytes_backup = total;
        }
        if ((total <= now && total > 0) || local_file_found) { //読み込み中と思われる
            delete this.onEnterFrame;
            if (local_file_found) {
                doJavaScript("document.title = " + titleJSCom + ";");
                //↓totalサイズが、なぜか以前の値より小さく変更されてしまったっぽい時
                //読み込み中に回線切断とかの時はこうなるっぽい
            } else if (total < total_bytes_backup) {
                var rate = Math.round(now / total_bytes_backup * 100);
                doJavaScript("document.title = 'Disconnect(" + rate + "%)';");
            } else {
                doJavaScript("document.title = " + titleJSCom + ";");
            }
            return;
        }
        bytes_ary.push({
            bytes: now,
            time: checkTime
        });
        if (bytes_ary.length > 10) {
            bytes_ary.splice(0, 1);
        }
        if (bytes_ary.length >= 2) {
            var last_num = bytes_ary.length - 1;
            var kbps = (bytes_ary[last_num].bytes - bytes_ary[0].bytes) / (bytes_ary[last_num].time - bytes_ary[0].time) * 1000 / 1024 * 8;
            kbps = Math.round(kbps);
            if (total > 0) {
                var dur = nico.player._contentLength; //秒で返る
                var rate = Math.round(now / total * 100);
                //var per_byte = Math.round(total / dur);//一秒に必要なbyte数
                var rest_byte = Math.round(((total - now) * dur) / total); //残り時間に必要なbyte
                //trace(per_byte +" > "+ now);
                //trace("rest_byte:"+rest1_byte + "rest_byte:"+rest_byte);
                //trace(per_byte +"<"+ kbps);
                if (kbps > rest_byte) {
                    go_flag = true;
                } else {
                    go_flag = false;
                }
            } else {
                var rate = 0;
            }
            if (!go_flag) {
                doJavaScript("document.title = '×" + kbps + "kbps(" + rate + "%)'+" + titleJSCom + ";");
            } else {
                doJavaScript("document.title = '○" + kbps + "kbps(" + rate + "%)'+" + titleJSCom + ";");
            }
        }
    }
};
//ローカルFLVがあるかどうかチェック
timeLine.createEmptyMovieClip("check_flv", 140);
timeLine.check_flv.onEnterFrame = function() {
    if (check_interval % 10 == 0 && check_flv_status == "ready") {
        var crossdomain_dir = local_server_index[local_server_num].substring(0, local_server_index[local_server_num].lastIndexOf("/") + 1);
        System.security.loadPolicyFile(crossdomain_dir + "crossdomain.xml");
        flv_index.checkPolicyFile = true;
        flv_index.load(local_server_index[local_server_num]);
        check_flv_status = "connecting";
    }
};
var flv_index = new LoadVars();
flv_index.onData = function(src) {
    if (src != undefined) {
        var ext = '.flv';
        var search_result = src.indexOf(VIDEO + ext);
        if (search_result == -1) {
            ext = '.mp4';
            search_result = src.indexOf(VIDEO + ext);
        }
        if (search_result == -1) {
            ext = '.swf';
            search_result = src.indexOf(VIDEO + ext);
        }
        if (search_result == -1) {
            ext = '.nmm';
            search_result = src.indexOf(VIDEO + ext);
        }
        if (search_result != -1) { //動画が見つかった
            local_file_found = true;
            local_file_name = VIDEO + ext;
            delete timeLine.check_flv.onEnterFrame;
            if (auto_comment_post) {
                //auto_comment_postならgetflv止めたまま保存済みコメントのラスト番号を調べにいく
                countLocalXML(VIDEO);
                return;
            } else {
                getflv_status = "ready"; //getflv開始
            }
        }
    }
    //動画が見つからない
    if (local_server_num < local_server_index.length - 1) { //次のサーバーをチェック
        local_server_num++;
        check_flv_status = "ready";
        return;
    } else { //最後のサーバーまでチェックしたので普通にニコニコに接続
        //ローカルFLVがないときは、自動コメント収集禁止にしておく(自分の好みで)
        auto_comment_post = false;
        delete timeLine.check_flv.onEnterFrame;
        getflv_status = "ready"; //getflv開始
    }
};
/*
//デバッグ用
main_bar.createTextField("debug_info",1000,5,40,290,19);
main_bar.debug_info.type = "dynamic";
main_bar.debug_info.border = true;
main_bar.debug_info.selectable = false;
main_bar.debug_info.background = true;
main_bar.debug_info.autoSize = true;
main_bar.debug_info.setTextFormat(red10_fmt);
function showDebugInfo(info){
    main_bar.debug_info.text = info;
}*/
//マイリストを見ているときに自動リンクが反応したら、タブをフラッシュ？させて知らせる
timeLine.createEmptyMovieClip("flash_tab", 150);

function flashTab(mode) {
    if (mode == "start") {
        timeLine.flash_tab.onEnterFrame = function() {
            if (check_interval % 30 == 0) {
                if (link_thumb.tab0.over_lay_red._visible) {
                    link_thumb.tab0.over_lay_red._visible = false;
                } else {
                    link_thumb.tab0.over_lay_red._visible = true;
                }
            }
        };
    } else if (mode == "stop") {
        delete timeLine.flash_tab.onEnterFrame;
        link_thumb.tab0.over_lay_red._visible = false;
    }
}
//サムネをホイールクリックでバックグラウンドで開く
//一応動くが、問題点が二つ
//１ホイールクリックでのウィンドウオープンはブラウザのポップアップブロックにひっかかる
//ポップアップブロック解除しないとだめだ
//２ホイールクリックではFlashにfocusが移らない
//WheelPlusとかマウ筋とか使ってると、
//ホイールシークだけで操作してFlashのボタン押さない時とか割とよくあると思うんだが
//そういう状態で自動リンクが反応したりすると
//いったんwrapper上の関係ないところを左クリックしてfocusうつしたあと
//おもむろにホイールクリックとかしないとウィンドウが開かない
//またバックグラウンドで開くと、今のウィンドウから一旦focusが外れるらしいので
//またFlashからfocusが外れる
//実用性が低すぎる
//どう考えてもサムネ右下のBボタン押したほうが楽だ
//※nico.videowindowをホイールクリックしたらpauseするようにした
var wheel_click_prev = false;
timeLine.createEmptyMovieClip("key_check", 160);
timeLine.key_check.onEnterFrame = function() {
    var wheel_click_status = Key.isDown(4);
    if (wheel_click_prev != wheel_click_status) {
        if (wheel_click_status == true) {
            //var xm = link_thumb._xmouse;
            //var ym = link_thumb._ymouse;
            //if(xm>0 && xm<130 && ym>20 && ym<120){
            //  link_thumb.open_blur.onRelease();
            //}
            if (mouse_on_videowindow) {
                nico.player.pause();
            }
            if (mouse_on_overlay) { //映像を非表示、音声とコメントは流れる
                if (nico.player._video._visible) {
                    nico.player._video._visible = false;
                } else {
                    nico.player._video._visible = true;
                }
            }
            if (first_time_full) {
                if (mouse_on_playButton) { //通常サイズで再生
                    first_time_full = false;
                    nico.videowindow.playButton.onRelease();
                }
            }
            if (mouse_on_clock) {
                clock_mode++;
                if (clock_mode > 1) {
                    clock_mode = 0;
                }
                showClockInfo(clock_mode);
                clock_mode_so.data.number = clock_mode;
                clock_mode_so.flush();
            }
        }
        wheel_click_prev = wheel_click_status;
    }
};
/*
//自動再生禁止時にプレイヤーがスタートするのを監視
timeLine.createEmptyMovieClip("check_player_start",170);
function checkPlayerStart(){
    timeLine.check_player_start.onEnterFrame = function(){
        var state = nico.player.__get__state();
        if(state == "playing" || state == "connectionError" || nico.player.dummy_active){
            clearAutoPlayInfo();
            delete this.onEnterFrame;
        }
    };
}
*/
//強引にシークする
timeLine.createEmptyMovieClip("check_seek", 180);

function checkSeek(start_time, mode) {
    var delta;
    if (mode == 'forward') {
        delta = mouse_forward;
    } else if (mode == 'backward') {
        delta = -mouse_backward;
    } else {
        return;
    }
    if (delta == 0) return;
    var playing_flag = false;
    var state = nico.player.__get__state();
    if (state == "playing") {
        playing_flag = true;
        nico.player.pause();
    }
    var limit_interval = 120;
    var m = 1;
    timeLine.check_seek.onEnterFrame = function() {
        if (!nico.player.isSeeking) {
            var now = nico.player.__get__playheadTime();
            var dest_time = start_time + delta / 2;
            var jump_time = start_time + delta * m;
            if (test_mode) {
                var temp = "s=" + start_time + " d=" + dest_time + " j=" + jump_time + " m=" + m + " d=" + delta;
                showInfoOnMainBar(temp);
                System.setClipboard(temp);
            }
            if (limit_interval < 0 || (delta > 0 && now >= dest_time) || (delta < 0 && now <= dest_time)) {
                delete this.onEnterFrame;
                if (playing_flag) {
                    nico.player.pause();
                }
            } else {
                if (jump_time <= 0) {
                    nico.player.__set__playheadTime(0);
                    limit_interval = -1;
                } else if (jump_time >= nico.player._contentLength) {
                    nico.player.__set__playheadTime(nico.player._contentLength);
                    limit_interval = -1;
                } else {
                    nico.player.__set__playheadTime(jump_time);
                    m = m * 2;
                }
            }
        }
        limit_interval--;
    };
}
function bytesToString(bytes) {
    var unit = "B";
    if (bytes / 1024 >= 1) {
        bytes /= 1024;
        unit = "KB";
        if (bytes / 1024 >= 1) {
            bytes /= 1024;
            unit = "MB";
        }
    }
    var bytes_string = String(bytes).substr(0, 4);
    if (bytes_string.charAt(3) == ".") bytes_string = bytes_string.substr(0, 3);
    bytes_string = bytes_string + unit;
    return bytes_string;
}
//動画のgetBytesLoadedを監視する
timeLine.createEmptyMovieClip("check_video_bytes_loaded", 190);

function checkVideoBytesLoaded() {
    var interval = 10;
    var delta = 0;
    timeLine.check_video_bytes_loaded.onEnterFrame = function() {
        var loaded = nico.player.getBytesLoaded();
        //動画を少し（適当）に読み込んだ後、少しの間onMetaDataを待つ
        if (delta == 0 && loaded > 20) {
            delta = 1;
        }
        if (interval < 0) {
            if (nico.isShiSwfPlayer()) {
                play_start_flag = true;
            }
            if (clock_info.movie_type == "") {
                clock_info.movie_type = movie_type;
            }
            if (clock_info.movie_resolution == "") {
                if (nico.video_base_video._width != undefined && nico.video_base_video._height != undefined) {
                    clock_info.movie_resolution = Math.round(nico.video_base_video._width) + "x" + Math.round(nico.video_base_video._height);
                }
            }
            if (clock_info.movie_framerate == "") {
                if (nico.player._totalFrames != undefined && nico.player._contentLength != undefined) {
                    clock_info.movie_framerate = Math.round(nico.player._totalFrames / nico.player._contentLength) + "fps";
                }
            }
            /*
            if(clock_info.movie_datarate == ""){
                if(nico.player.stream_ns.bytesTotal != undefined){
                    if(nico.player._contentLength != undefined){
                        clock_info.movie_datarate = Math.round(nico.player.stream_ns.bytesTotal * 8/ nico.player._contentLength / 1000 ) + "kbps";
                    }
                }
                //swf用。_totalBytesでは正確なファイルサイズがでないようだ
                //if(nico.player._totalBytes != undefined){
                //  clock_info.movie_datarate = bytesToString(nico.player._totalBytes);
                //}
            }
            */
            showClockInfo(clock_mode);
            if (nico.player.videoStream_width == undefined && nico.player.videoStream_height == undefined) {
                nico.player.videoStream_width = nico.video_base_video._width;
                nico.player.videoStream_height = nico.video_base_video._height;
            }
            //動画の長さにMessagesが収められてしまうのを防ぐ
            //realLenを受け取ってからコメントサーバに接続する
            nico.lastConnectBoard = function() {
                nico.connectBoard(false);
            };
            nico.lastConnectBoard();
            //動画の最後のあたりのコメントのvposがいじられてしまうのを防ぐ
            //メモ CreateMessageの最後のほうのvpos
            /*nico.player.__get__totalTime = function () {
                //↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                return nico.player._contentLength * 1.1;
                //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            };
            nico.player.totaltime = nico.player._contentLength * 1.1;*/
            delete this.onEnterFrame;
        }
        interval -= delta;
    };
}
//_root毎フレームずっと処理し続ける用
_root.onEnterFrame = function() {
    updateFilter("check");
    check_interval--;
    if (check_interval < 0) {
        check_interval = 599;
    }
};
//flv_booster
//ボタンとメニューの間の深度に作成
var flv_booster = createEmptyMovieClip("booster", 19999);
//それっぽい所へ移動
flv_booster._x = 699;
flv_booster._y = header._y - 3;
//輝度を調節するターゲットを指定
var flv_booster_target_mc = "_root.nico.video_base";
//子から親へのアクセス許可
//System.security.allowDomain(flv_booster_url);
if (use_flv_booster) {
    header.clock.createTextField("contrast", 10, 0, 15, 1, 1);
    header.clock.contrast.type = "dynamic";
    header.clock.contrast.border = true;
    header.clock.contrast.background = true;
    header.clock.contrast.autoSize = true;
    header.clock.contrast.selectable = false;
    header.clock.contrast._visible = false;
    header.clock.contrast.text = "コントラスト";
    header.clock.contrast.setTextFormat(black12_fmt);
    header.clock.createTextField("brightness", 11, 0, 15, 1, 1);
    header.clock.brightness.type = "dynamic";
    header.clock.brightness.border = true;
    header.clock.brightness.background = true;
    header.clock.brightness.autoSize = true;
    header.clock.brightness.selectable = false;
    header.clock.brightness._visible = false;
    header.clock.brightness.text = "ブライトネス";
    header.clock.brightness.setTextFormat(black12_fmt);
    header.clock.createTextField("sharp", 12, 0, 15, 1, 1);
    header.clock.sharp.type = "dynamic";
    header.clock.sharp.border = true;
    header.clock.sharp.background = true;
    header.clock.sharp.autoSize = true;
    header.clock.sharp.selectable = false;
    header.clock.sharp._visible = false;
    header.clock.sharp.text = "↑ぼかし＆シャープ↓";
    header.clock.sharp.setTextFormat(black12_fmt);
}
//変数を渡しながら読み込み
if (useswfversion >= 7) {
    var flv_booster_mcl = new MovieClipLoader();
    var flv_booster_listener = new Object();
    flv_booster_listener.onLoadInit = function(video) {
        video._lockroot = false;
        // ボタンにカーソルを乗せた時の処理
        video.contrast.onRollOver = function() {
            // マウスの監視開始
            header.clock.contrast._visible = true;
            Mouse.addListener(video.mouseListener);
            this.base._alpha = this.flg ? 30 : 60;
        };
        video.brightness.onRollOver = function() {
            // マウスの監視開始
            header.clock.brightness._visible = true;
            Mouse.addListener(video.mouseListener);
            this.base._alpha = this.flg ? 30 : 60;
        };
        video.sharp.onRollOver = function() {
            // マウスの監視開始
            header.clock.sharp._visible = true;
            Mouse.addListener(video.mouseListener);
            this.base._alpha = this.flg ? 30 : 60;
        };
        // ボタンからカーソルを離したときの処理
        video.contrast.onRollOut = video.contrast.onReleaseOutside = function() {
            // マウスの監視終了
            header.clock.contrast._visible = false;
            video.Mouse.removeListener(video.mouseListener);
            this.base._alpha = this.flg ? 30 : 100;
        };
        video.brightness.onRollOut = video.brightness.onReleaseOutside = function() {
            // マウスの監視終了
            header.clock.brightness._visible = false;
            video.Mouse.removeListener(video.mouseListener);
            this.base._alpha = this.flg ? 30 : 100;
        };
        video.sharp.onRollOut = video.sharp.onReleaseOutside = function() {
            // マウスの監視終了
            header.clock.sharp._visible = false;
            video.Mouse.removeListener(video.mouseListener);
            this.base._alpha = this.flg ? 30 : 100;
        };
    };
    flv_booster_mcl.addListener(flv_booster_listener);
    if (use_flv_booster) {
        flv_booster_load = true;
        flv_booster_mcl.loadClip("flv_booster.swf?target_mc=" + flv_booster_target_mc, flv_booster);
    }
} else {
    if (use_flv_booster) {
        flv_booster_load = true;
        flv_booster.loadMovie("flv_booster.swf?target_mc=" + flv_booster_target_mc);
    }
}
EOT;
//メインスクリプト終わり

$movie->add(new SWFAction($MainScript));
$movie->nextFrame();
$movie->save("flvplayer_wrapper.swf");

header("Content-Type: application/x-shockwave-flash");
//header("Cache-Control: no-cache");//普通はサーバーが勝手に送る
//header("Pragma: no-cache");
//$movie->output();

?>
