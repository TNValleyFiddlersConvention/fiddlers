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
        
        if let pdf = NSBundle.mainBundle().URLForResource("campus-map", withExtension: "pdf", subdirectory: nil, localization: nil)  {
            let req = NSURLRequest(URL: pdf)
            let webView = UIWebView(frame: CGRectMake(0,30,self.view.frame.size.width-40,self.view.frame.size.height-40))
            webView.loadRequest(req)
            webView.scalesPageToFit = true
            self.view.addSubview(webView)
        }
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

}
