package edu.athens.tennesseevalleyoldtimefiddlersconvention;

import android.os.Bundle;
import android.view.View;
import android.app.Activity;
import android.content.Intent;

public class Info2Activity extends Activity {
// Open up the layout for the Info activity
	 
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_info2);
	}
	
	// Go back to Home Screen
	public void OnClickHome(View view) {
		Intent myIntent = new Intent(getBaseContext(), MainActivity.class);
		myIntent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
		startActivity(myIntent);
		}

}
