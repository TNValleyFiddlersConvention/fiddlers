//
//  ContestantsTableViewController.swift
//  FidConApp
//
//  Created by Garrett Gillott on 9/11/15.
//  Copyright (c) 2015 Garrett Gillott. All rights reserved.
//

import UIKit

class ContestantsTableViewController: UITableViewController {
    
    //this is the connection variable
    var con = ServerConnect()
    
    //jsonResults is the variable where we are storing the data from the server
    var jsonResults = NSArray()

    override func viewDidLoad() {
        super.viewDidLoad()
        
        //this is where we are fetching the data from the server
        jsonResults = con.downloadItems(categories)
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
        return jsonResults.count
    }

    
    override func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        
        //here we are deciding which table view's cells are being modified
        let cell = tableView.dequeueReusableCellWithIdentifier("Schedule", forIndexPath: indexPath) 
        
        //entry is where we are fetching a single entry from the data
        let entry: NSDictionary = jsonResults[indexPath.row] as! NSDictionary
        
        //here is where we are displaying the name of the category from the entry
        cell.textLabel?.text = (entry["category_name"] as! String)

        return cell
    }
    
    //This function is where we segue to display all the names of the contestants from any given category
    override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
        //this makes sure that we only run this code upon the correct segue
        if(segue.identifier == "displayNames"){
            
            //this sets the row index to that of the cell clicked on by the user
            let selectedRowIndex = self.tableView.indexPathForSelectedRow!
            
            //this sets the category to that of the cell clicked on by the user
            let selectedRowTitle = self.tableView.cellForRowAtIndexPath(selectedRowIndex)?.textLabel?.text
            
            //this is where we set up the view controller that we are seguing to
            let displayNamesVC: DisplayNamesTableViewController = segue.destinationViewController as! DisplayNamesTableViewController
            
            //this sets the selectedRowTitle of the view controller to the correct text and then segues
            displayNamesVC.displayNamesTitle = selectedRowTitle!
        }
    }

}
