<?php
require( 'auth.php' );

OpenLibrary( 'hui.library' );
OpenLibrary( 'modules.library' );
OpenLibrary( 'locale.library' );

$gYaps_locale = new Locale( 'yaps', AMP_LANG );
$gHui = new Hui( $env['ampdb'] );
$gHui->LoadWidget( 'amppage' );
$gHui->LoadWidget( 'amptoolbar' );
$gHui->LoadWidget( 'xml' );
$gHui->LoadWidget( 'empty' );

$gPage_content = $gStatus = $gMenu = $gToolbars = '';
$gTitle = $gYaps_locale->GetStr( 'yaps_title' );

$action_disp = new HuiDispatcher( 'action' );

$action_disp->AddEvent( 'setsettings', 'action_setsettings' );
function action_setsettings( $eventData )
{
    global $env, $gStatus, $gYaps_locale;

    $mod_settings = new ModuleConfig( $env['ampdb'], 'yaps' );
    $mod_settings->SetKey( 'gs_exec', $eventData['gsexec'] );
    $gStatus = $gYaps_locale->GetStr( 'settingsset_status' );
}

$action_disp->Dispatch();

$main_disp = new HuiDispatcher( 'main' );

$main_disp->AddEvent( 'default', 'main_default' );
function main_default( $eventData )
{
    global $env, $gYaps_locale, $gTitle, $gPage_content;

    $mod_settings = new ModuleConfig( $env['ampdb'], 'yaps' );
    $gs_exec = $mod_settings->GetKey( 'gs_exec' );
    if ( !strlen( $gs_exec ) ) $gs_exec = '/usr/bin/gs';

    $xml_def = 
'<vertgroup><name>prefs</name><children>
  <form><name>settings</name><args><action type="encoded">'.urlencode( build_events_call_string( '', array( array( 'main', 'default', '' ), array( 'action', 'setsettings', '' ) ) ) ).'</action></args><children>
    <grid><name>settingsgrid</name><children>
      <label row="0" col="0"><name>gsexec</name><args><label>'.$gYaps_locale->GetStr( 'gsexec_label' ).'</label></args></label>
      <string row="0" col="1"><name>gsexec</name><args><disp>action</disp><value type="encoded">'.urlencode( $gs_exec ).'</value><size>20</size></args></string>
    </children></grid>
    <submit><name>submit</name><args><caption>'.$gYaps_locale->GetStr( 'savesettings_submit' ).'</caption></args></submit>
  </children></form>
</children></vertgroup>';

    $gPage_content = new HuiXml( 'page', array( 'definition' => $xml_def ) );

    $gTitle = $gYaps_locale->GetStr( 'yaps_title' );
}

$main_disp->Dispatch();

$gHui->AddChild( new HuiAmpPage( 'page', array( 'pagetitle' => $gTitle, 'menu' => $gMenu, 'toolbars' => $gToolbars, 'maincontent' => $gPage_content, 'status' => $gStatus ) ) );
$gHui->Render();

?>