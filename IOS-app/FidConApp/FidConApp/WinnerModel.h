//
//  WinnerModel.h
//  jsonTest
//
//  Created by Admin on 10/23/15.
//  Copyright (c) 2015 Admin. All rights reserved.
//

#import <Foundation/Foundation.h>


@protocol WinnerModelProtocol <NSObject>

- (void)itemsDownloaded:(NSArray *)items;

@end

@interface WinnerModel : NSObject

@property (nonatomic, weak) id<WinnerModelProtocol> delegate;

- (NSArray *)downloadItems:(NSString*)url;

@end