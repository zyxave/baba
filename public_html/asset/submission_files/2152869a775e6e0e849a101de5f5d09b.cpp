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

bool visited[100][100];
int pet[100][100];
int cnt = 0;
int dx[] = {0, 0, -1, 1};
int dy[] = {1, -1, 0, 0};
 
void ff(int x, int y)
{
    for(int i = 0; i < 4; i++)
    {
        if(!visited[x+dx[i]][y+dy[i]] && pet[x+dx[i]][y+dy[i]] == 1)
        {
            visited[x+dx[i]][y+dy[i]] = 1; cnt++;
            ff(x+dx[i], y+dy[i]);
        }
    }
}

int main()
{
    int t; cin >> t;
    while(t--)
    {
        memset(visited,0, sizeof visited);
        memset(pet,0, sizeof pet);
        int n, m;
        cin >> n >> m;
        for(int i = 1; i <= n; i++)
        {
            for(int j = 1; j <= m; j++)
                cin >> pet[i][j];
        }
        int res = 0;
        for(int i = 1; i <= n; i++)
        {
            for(int j = 1; j <= m; j++)
            {
                if(!visited[i][j] && pet[i][j] == 1)
                {
                    visited[i][j] = 1;
                    cnt = 1;
                    ff(i,j);
                    res = max(res,cnt);
                    cnt = 0;
                }
            }
        }
        cout << res << "\n";
    }
    return 0;
}


