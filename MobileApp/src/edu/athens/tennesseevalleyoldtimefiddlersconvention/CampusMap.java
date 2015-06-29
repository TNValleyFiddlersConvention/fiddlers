package edu.athens.tennesseevalleyoldtimefiddlersconvention;

import android.os.Bundle;
import android.app.Activity;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;

public class CampusMap extends Activity {  
private ZoomImageView picView;

// Open the layout for the CampusMap Activity
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_campusmap);
		picView = (ZoomImageView) findViewById(R.id.imageCampusMap);
		Bitmap picBmp = BitmapFactory.decodeResource(getResources(), R.drawable.map);
		picView.setImageBitmap(picBmp);
	}
}
 