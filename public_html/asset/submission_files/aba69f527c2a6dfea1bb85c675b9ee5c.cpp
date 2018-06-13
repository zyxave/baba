//
//  main.cpp
//  A
//
//  Created by vincent alek on 1/6/18.
//  Copyright © 2018 vincent alek. All rights reserved.
//

#include <iostream>
#include <vector>
#include <utility>
#include <map>
#include <math.h>
#include <algorithm>
#include <stdio.h>
#include <string.h>
using namespace std;
int main(){
    int t; cin >> t;
    while(t--){
        int p, a, m, r;    cin >> p >> a >> m >> r;
        int money = r, game = 0;
        while((r - p) >= 0){
            r -= p;
            game ++;
            p -= a;
            if(p <= m) p = m;
        }
        cout << game << endl;
    }
    return 0;
}


