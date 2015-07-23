/* MainActivity.java


The Mobile App Group is lead by Erin and followed by Corey, Mason, 
and Thomas.

*/
package edu.athens.tennesseevalleyoldtimefiddlersconvention;

import android.net.Uri;
import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.content.Context;

public class MainActivity extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
	// Open the layout for this activity screen
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
	// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	public void OnClickLogo(View view) {
	// Open the TVOTFC website after clicking on the Fiddler logo.		
		Intent intent_website=new Intent(Intent.ACTION_VIEW);
		intent_website.setData(Uri.parse("http://www.fiddlers.no-ip.org/"));
		startActivity(intent_website);		
	}

	public void OnClickInfo(View view) {
	// Open the Admissions Info Activity
		final Context context = this;
		Intent intent = new Intent(context, InfoHomeActivity.class);
        startActivity(intent);	
	}
	
	public void OnClickMap(View view) {
	// Open the CampusMap Activity
		final Context context = this;
		Intent intent = new Intent(context, CampusMap.class);
        startActivity(intent);		
	}	
	
	public void OnClickSchedule(View view) {
	// Open the Schedule Activity 
		final Context context = this;
		Intent intent = new Intent(context, Schedule.class);
        startActivity(intent);	
	}
		
	public void OnClickWinners(View view) {
	// Open the Winners Activity
		final Context context = this;
		Intent intent = new Intent(context, Winners.class);
        startActivity(intent);		
	}
	
	public void OnClickCam(View view) {
		// Open the Winners Activity
			final Context context = this;
			Intent intent = new Intent(context, WebCamActivity.class);
	        startActivity(intent);		
		}
	
}
