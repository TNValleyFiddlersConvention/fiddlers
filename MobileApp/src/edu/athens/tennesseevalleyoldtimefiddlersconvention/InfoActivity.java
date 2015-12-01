package edu.athens.tennesseevalleyoldtimefiddlersconvention;


import android.os.Bundle;
import android.view.View;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;

public class InfoActivity extends Activity {
// Open up the layout for the Info activity
	 
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_info);
	}
	
	public void OnClickArrow(View view) {
		// Open the Admissions Info Activity
			final Context context = this;
			Intent intent = new Intent(context, Info2Activity.class);
	        startActivity(intent);	
		}
}
