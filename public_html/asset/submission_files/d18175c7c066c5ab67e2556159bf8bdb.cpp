#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,n,mi,i,a[1010101];
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>n;
		mi=10e17;
		for(i=1;i<=n;i++)
		{
			cin>>a[i];
			mi=min(mi,a[i]);
		}
		if(a[1]==mi)
			cout<<"Nolram\n";
		else
			cout<<"Marlon\n";
	}
}
