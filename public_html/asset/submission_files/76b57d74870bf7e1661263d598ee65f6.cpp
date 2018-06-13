#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll n,i,ta,tb,a[10101010],t;
int main()
{
	cin>>n;
	for(i=1;i<=n;i++)
	{
		cin>>ta>>tb;
		a[ta]=tb;
	}
	cin>>t;
	while(t--)
	{
		cin>>ta;
		cout<<a[ta]<<"\n";
	}
}
