import { Component, OnInit } from '@angular/core';
import { AccessProviders } from '../providers/access.providers';
import { ActivatedRoute, Router } from '@angular/router';
import { AlertController, LoadingController, ToastController } from '@ionic/angular';
import { Storage } from '@ionic/storage';

@Component({
  selector: 'app-viewmessage',
  templateUrl: './viewmessage.page.html',
  styleUrls: ['./viewmessage.page.scss'],
})
export class ViewmessagePage implements OnInit {

  donation_id: number;
  
  message: string;
  ownermessage =[]
  datastorage: any;
  created_at: any;

  constructor( private actRoute: ActivatedRoute,
    private accsPrvdrs: AccessProviders, private storage: Storage,
      private router:Router, private loadingCtrl: LoadingController,
        private alertController: AlertController,
     private toastCtrl: ToastController) { }

  ngOnInit() {
    this.actRoute.params.subscribe((data: any)=>{
      console.log(data);
      this.donation_id = data.donation_id;
 
      if(this.donation_id!=0){
        this.ownermessage = [];
        this.vmessage();
 
      }
     
    });
 
    
   
  }

  ionViewDidEnter(){

  }


  async vmessage(){
    const load = await this.loadingCtrl.create({
      message : "Loading....",
     });
    
    
    return new Promise(resolve => {
      let data = {
        aksi: 'loadmessage',
        donation_id: this.donation_id,
      }
  
      this.accsPrvdrs.postData(data, 'messageofowner.php').subscribe((res:any)=>{
        if(res.success==true){
          for(let datas of res.result){
            this.ownermessage.push(datas);
            console.log(datas);
            load.dismiss();
          }
      
        }else{
        load.dismiss();
        this.presentToast(res.msg);
        }
    },(err)=>{
      load.dismiss();
      console.log();
      this.presentToast("Cannot Load Data"); 
       
      }) 
         
    });
  }
  
  async presentToast(a){
    const toast = await this.toastCtrl.create({
      message: a,
      duration: 1500,
      position: 'top'
    });
    toast.present();
 }
}