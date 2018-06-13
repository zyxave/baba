#include <bits/stdc++.h>

using namespace std;

int arr[10][10];
int v,t;

int g(int n,int m)
{
	if(n==v || m==t)
	{
		return 0;
	}
	g(n+1,m);
	g(n,m+1);
	g(n+1,m+1);
	if(arr[n][m]==0)
	else if(arr[n][m]==1)
	{
		if(arr[n][m+1]==1)
		{
			arr[n][m]+=arr[n][m+1];
			if(arr[n+1][m]==1)
			{
				arr[n][m]+=arr[n+1][m];
				arr[n+1][m]=arr[n][m];
				if(arr[n+1][m+1]==1)
				{
					arr[n][m]+=arr[n+1][m];
					arr[n+1][m]=arr[n][m];
				}
			}
			if(arr[n+1][m]==1)
			{
				arr[n][m]+=arr[n+1][m];
				arr[n+1][m]=arr[n][m];
			}
			arr[n][m+1]=arr[n][m];
		}
		if(arr[n+1][m]==1)
		{
			arr[n][m]+=arr[n+1][m];
			arr[n+1][m]=arr[n][m];
		}
	}
}

void f()
{
	cin>>v>>t;
	for(int a=0;a<v;a++)
		for(int b=0;b<t;b++)
			cin>>arr[a][b];
	g(0,0);
	for(int a=0;a<v;a++)
	{
		for(int b=0;b<t;b++)
			cout<<arr[a][b];
		cout<<endl;
	}
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
