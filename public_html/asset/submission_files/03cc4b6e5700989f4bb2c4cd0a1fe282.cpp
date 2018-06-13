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
#include <queue>
#include <math.h>
#include <algorithm>
#include <stdio.h>
#include <string.h>
using namespace std;

#define fir first
#define sec second
typedef pair<int,int> ii;

priority_queue<ii, vector<ii>, greater<ii> > pq;
int n, start, goal, money;
int jarak[103];
vector<ii> vec[103];


int main()
{
    int t; cin >> t;
    while(t--)
    {
        for(int i = 0; i <= 100; i++)
        {
            jarak[i] = 1e9;
            vec[i].clear();
        }
        
        cin >> n >> start >> goal >> money;
        for(int i = 1; i <= n; i++)
        {
            int x, y, z;
            cin >> x >> y >> z;
            vec[x].push_back({y,z});
            vec[y].push_back({x,z});
        }
        jarak[start] = 0;
        pq.push({0,start});
        while(!pq.empty())
        {
            ii curr = pq.top(); pq.pop();
            int u = curr.sec, jar = curr.fir;
            for(int i = 0; i < vec[u].size(); i++)
            {
                int v = vec[u][i].fir;
                int cost = vec[u][i].sec;
                if(jarak[v] > jar + cost)
                {
                    jarak[v] = jar+cost;
                    pq.push({jar+cost, v});
                }
            }
        }
        if(jarak[goal] > money) cout << "Andi tidak bisa mengikuti seminar.\n";
        else cout << jarak[goal] << "\n";
    }
}

