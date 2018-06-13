#include<bits/stdc++.h>
using namespace std;

int t,a,b,ind[10000001],m;

int main ()
{
	cin>>t;
	while(t--)
	{
		cin>>a>>b;
		ind[a]=b;
	}
	cin>>t;
	while(t--)
	{
		cin>>m;
		cout<<ind[m]<<endl;
	}
}
