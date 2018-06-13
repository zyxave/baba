//
//  main.cpp
//  B
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
#define ull unsigned long long
using namespace std;

ull pwr(ull a, int b)
{
    if(b == 0) return 1;
    else return pwr(a,b-1)*a;
}

ull c[30][30];
int main()
{
    c[0][0] = 1;
    for(int i = 1; i <= 25; i++)
    {
        c[i][0] = 1;
        for(int j = 1; j <= 25; j++)
        {
            c[i][j] = c[i - 1][j - 1] + c[i - 1][j];
        }
    }
    int t; cin >> t;
    while(t--)
    {
        ull p, q; cin >> p >> q;
        for(int i = 0; i <= q; i++)
        {
            if(i != 0) cout << c[q][i]*pwr(p,i);
            if(i != q) cout << 'x';
            if(q-i >= 2) cout << q-i;
            
            if(i == q) cout << "\n";
            else cout << " ";
        }
    }
}
