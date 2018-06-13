#include <bits/stdc++.h>

using namespace std;

int arr[10][10];
int v,t;

int g(int n,int m)
{
	if(n==v || m==t)
		return 0;
	int ans=g(n+1,m)+g(n,m+1);
	if(arr[n][m]==1)
		ans+=1;
	else if(arr[n][m]==0)
		return 0;
	return ans;
}

void f()
{
	cin>>v>>t;
	for(int a=0;a<v;a++)
		for(int b=0;b<t;b++)
			cin>>arr[a][b];
	cout<<g(0,0)<<endl;
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
