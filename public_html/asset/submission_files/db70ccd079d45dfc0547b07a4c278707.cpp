//
//  main.cpp
//  B
//
//  Created by vincent alek on 1/3/18.
//  Copyright © 2018 vincent alek. All rights reserved.
//

#include <iostream>
using namespace std;
int main()
{
    int t;
    cin >> t;
    while(t--)
    {
        int a, b; cin >> a >> b;
        int c = a-b;
        int res = c/100;
        c %= 100;
        res += c/20;
        c %= 20;
        res += c/5;
        c %= 5;
        res += c;
        cout << res << "\n";
    }
    return 0;
}
