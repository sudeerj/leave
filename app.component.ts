import {Component, ViewChild} from '@angular/core';
import {Events, Nav, Platform} from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

import { TabsPage } from '../pages/tabs/tabs';
import {HomePage} from "../pages/home/home";
import {LoginPage} from "../pages/login/login";
import {ProfilePage} from "../pages/profile/profile";
import {SalesPage} from "../pages/sales/sales";
import { ServiceSingleton } from '../providers/service-singleton';

@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) nav: Nav;

  rootPage:any;
  private menu=[
    {title:"Profile",component:ProfilePage},
    {title:"Sales",component:SalesPage},
  ]
  constructor(platform: Platform,public events:Events,private webService:ServiceSingleton, statusBar: StatusBar, splashScreen: SplashScreen) {
    platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      statusBar.styleDefault();
      splashScreen.hide();
    });
    // this.webService.checkLogin().then((login)=>{
    //   if(login){
    //     this.rootPage=SalesPage;
    //   }else{
    this.rootPage=LoginPage;
    //   }
    // });
    events.subscribe('opensale',()=>{
      this.nav.getActiveChildNav().select(1);
    });
  }
  openPage(i){
    switch (i){
      case 0:
        this.nav.getActiveChildNav().select(2);
        break;
      case 1:
        this.nav.getActiveChildNav().select(1);
        break;
    }

  }

}
