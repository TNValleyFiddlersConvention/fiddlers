//
//  DisplayNamesTableViewController.swift
//  FidConApp
//
//  Created by Garrett Gillott on 10/29/15.
//  Copyright © 2015 Garrett Gillott. All rights reserved.
//

import UIKit

class DisplayNamesTableViewController: UITableViewController {
    
    //the con variable is used to store the connection
    var con = ServerConnect()
    
    //jsonResult is where we are going to store the data from the server
    var jsonResult = NSArray()
    
    //result will store the parts of the data we want
    var result = NSMutableArray()
    
    //displayNamesTitle is where we are going to store the name of the category
    //it defalts to Error No Data Found for error checking
    var displayNamesTitle: String = "Error No Data Found"
    
    

    override func viewDidLoad() {
        super.viewDidLoad()
        
        //this is where we fetch the data from the server
        jsonResult = con.downloadItems(contestants)
        
       
        for i in 0..<jsonResult.count
        {
            let entry: NSDictionary = jsonResult[i] as! NSDictionary

            if((entry["category_name"] as! String) == displayNamesTitle)
            {
                result.addObject(entry)
            }
        }
        
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

    // MARK: - Table view data source

    override func numberOfSectionsInTableView(tableView: UITableView) -> Int {
        // #warning Incomplete implementation, return the number of sections
        return 1
    }

    override func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        // #warning Incomplete implementation, return the number of rows
        return result.count
    }

    
    override func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        //this is where we set what cell we are modifing
        let cell = tableView.dequeueReusableCellWithIdentifier("namesCell", forIndexPath: indexPath)

        // Configure the cell...
        //entry is where we are getting a single entry from the data
        let entry: NSDictionary = result[indexPath.row] as! NSDictionary
        
        //this is where we are checking to see if the entry category is the same as the
        //displayNamesTitle that was passed in from the segue
        
        //name is the variable where we are storing the contestants name
        var name = entry["fname"] as! String
        name += " "
        name += entry["lname"] as! String
            
        //here we are displaying the name in the table
        cell.textLabel?.text = name
        

        return cell
    }

}
