import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ModalController } from '@ionic/angular';
import { CategoriesPage } from '../../categories/categories.page';

@Component({
  selector: 'app-start',
  templateUrl: './start.component.html',
  styleUrls: ['./start.component.scss'],
})
export class StartComponent implements OnInit {

  constructor(private router: Router,  private modalCtrl: ModalController,) { }

  ngOnInit() {}

   // navigateToLoginPage(){
     // this.router.navigate(['pantrypost']);
 //   }

    async openTransparentModal(){
      const modal = await this.modalCtrl.create({
        component: CategoriesPage,
        cssClass: 'transparent-modal'
      });
      await modal.present();
    }
}
