package edu.athens.tennesseevalleyoldtimefiddlersconvention;


import android.os.Bundle;
import android.view.View;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;

public class InfoHomeActivity extends Activity {
// Open up the layout for the Info activity
	 
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activityhome_info);
	}
	
	public void OnClickArrow(View view) {
		// Open the Admissions Info Activity
			final Context context = this;
			Intent intent = new Intent(context, InfoActivity.class);
	        startActivity(intent);	
		}
}
