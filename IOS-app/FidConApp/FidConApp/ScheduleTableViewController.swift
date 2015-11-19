//
//  ScheduleTableViewController.swift
//  
//
//  Created by Garrett Gillott on 9/11/15.
//
//

import UIKit

class ScheduleTableViewController: UITableViewController {

    //con is for the connection variable
    var con = ServerConnect()
    //jsonResult is the variable where the data from the php file is stored
    var jsonResult = NSArray()
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        //This is where we actually fetch the data off the server
        jsonResult = con.downloadItems(schedule)
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
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
        let cell = tableView.dequeueReusableCellWithIdentifier("Schedule", forIndexPath: indexPath)
        
        //the entry variable is where we are pulling out the single entry that we want to work with
        let entry: NSDictionary = jsonResult[indexPath.row] as! NSDictionary
        
        //the category variable is where we are going to store the event
        let category = entry["category_name"] as! String
        
        //the day variable is where we are going to store the day of the event
        let day = entry["day"] as! String
        
        //now we are going to display the day time of the event
        cell.detailTextLabel?.text = "Day: " + day + ", Time: " + (entry["time"] as! String)
        
        //here we are displaying the name of the category from the entry
        cell.textLabel?.text = category
        
        return cell
    }
    
}
