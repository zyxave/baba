// A Dynamic Programming based C++ program to find minimum of coins
// to make a given change V
#include<bits/stdc++.h>
using namespace std;
 
int minCoins(int coins[], int m, int V)
{
    int table[V+1];
    table[0] = 0;
    for (int i=1; i<=V; i++)
        table[i] = INT_MAX;
    for (int i=1; i<=V; i++)
    {
        for (int j=0; j<m; j++)
          if (coins[j] <= i)
          {
              int sub_res = table[i-coins[j]];
              if (sub_res != INT_MAX && sub_res + 1 < table[i])
                  table[i] = sub_res + 1;
          }
    }
    return table[V];
}
 
void f()
{
	int n,x;
	std::cin>>n>>x;
    int coins[] =  {100, 20, 5, 1};
    int m = sizeof(coins)/sizeof(coins[0]);
    int V = n-x;
    cout<<minCoins(coins, m, V)<<endl;
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
