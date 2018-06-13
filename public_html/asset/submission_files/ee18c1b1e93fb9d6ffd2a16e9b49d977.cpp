//
//  main.cpp
//  F
//
//  Created by vincent alek on 1/6/18.
//  Copyright © 2018 vincent alek. All rights reserved.
//

#include <iostream>
#include <vector>
#include <utility>
#include <map>
#include <functional>
#include <math.h>
#include <algorithm>
#include <stdio.h>
#include <string.h>
using namespace std;

int X[103], Y[103];

int main()
{
    int t; cin >> t;
    while(t--)
    {
        
        int n, r, d;
        cin >> n >> d >> r;
        for(int i = 0; i < n; i++) cin >> X[i];
        for(int i = 0; i < n; i++) cin >> Y[i];
        sort(X, X+n); sort(Y, Y+n, greater<int>());
        int res = 0;
        for(int i = 0; i < n; i++)
        {
            res += max((X[i]+Y[i]-d),0)*r;
        }
        cout << res << "\n";
    }
}



