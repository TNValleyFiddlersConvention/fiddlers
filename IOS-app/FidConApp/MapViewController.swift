//
//  MapViewController.swift
//  FidConApp
//
//  Created by Garrett Gillott on 9/11/15.
//  Copyright (c) 2015 Garrett Gillott. All rights reserved.
//

import UIKit

class MapViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()

        // Do any additional setup after loading the view.
        //here we are setting pdf to be the name of the pdf stored in the images folder
        if let pdf = NSBundle.mainBundle().URLForResource("campus-map", withExtension: "pdf", subdirectory: nil, localization: nil)  {
            
            //here we are setting req to be a URL pointer the pdf file
            let req = NSURLRequest(URL: pdf)
            
            //this is where we are setting up the webView's size in width and height
            let webView = UIWebView(frame: CGRectMake(0,30,self.view.frame.size.width-40,self.view.frame.size.height-40))
            
            //here is where we are loading in the pdf we defined earlier
            webView.loadRequest(req)
            
            //This is where we are forcing the pdf's size to fit the defined size of the webView
            webView.scalesPageToFit = true
            
            //here we are adding the webView as a subview of the UIViewController
            self.view.addSubview(webView)
        }
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

}
