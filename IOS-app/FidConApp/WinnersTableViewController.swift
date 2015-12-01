//
//  WinnersTableViewController.swift
//  FidConApp
//
//  Created by Garrett Gillott on 9/11/15.
//  Copyright (c) 2015 Garrett Gillott. All rights reserved.
//

import Foundation
import UIKit



class WinnersTableViewController: UITableViewController {
    
    //this is the connection variable
    var con = ServerConnect()
    //jsonResult is where we store the data returned from the server
    var jsonResult = NSArray()
    override func viewDidLoad()
    {
         //This is where we actually fetched the data from the server
         jsonResult = con.downloadItems(winners)
      
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

    // MARK: - Table view data source

    override func numberOfSectionsInTableView(tableView: UITableView) -> Int {
        // #warning Potentially incomplete method implementation.
        // Return the number of sections.
        return 1
    }

    override func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        // #warning Incomplete method implementation.
        // Return the number of rows in the section.
        return jsonResult.count
    }

    
    override func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        
        //This is where we determine which table view's cells are being modified
        let cell = tableView.dequeueReusableCellWithIdentifier("winnersList", forIndexPath: indexPath)
        
        //the entry variable is where we are pulling out the single entry that we want to work with
        let entry: NSDictionary = jsonResult[indexPath.row] as! NSDictionary
        
        //the name variable is where we are going to store the name of the winner
        var name = entry["fname"] as! String
        name += " "
        name += entry["lname"] as! String
        
        //here we are displaying the name of the category from the entry
        cell.textLabel?.text = (entry["category_name"] as! String)
        
        //here we are displaying the name of the winner
        cell.detailTextLabel?.text = name
        
        return cell
    }

}
