#include<bits/stdc++.h>
using namespace std;

int t,n;
string str[100001];

int main ()
{
	cin>>t;
	while(t--)
	{
		cin>>n;
		for(int i=1;i<=n;i++)
		{
			cin>>str[i];
		}
		sort(str+1,str+n+1);
	}
	for(int i=1;i<=n;i++)
	{
		cout<<str[i]<<endl;
	}
}
