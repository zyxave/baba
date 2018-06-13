#include <bits/stdc++.h>
using namespace std;

int n,m;
int arr[10][10],ary[10][10];
bool arb[10][10];

void g(int x,int y)
{
	if(x==n || y==m || x<0 || y<0)
		return;
	else if(arr[x][y]==1)
	{
		ary[x][y]=arr[x][y]+max(ary[x-1][y],max(ary[x][y-1],ary[x-1][y-1]));
		g(x+1,y);
		g(x,y+1);
		g(x+1,y+1);
	}
}

void f()
{
	cin>>n>>m;
	for(int a=0;a<n;a++)
		for(int b=0;b<m;b++)
			cin>>arr[a][b];
	g(0,0);
	int mx=0;
	for (int a=0; a<n; a++)
    	mx=max(mx,*max_element(ary[a],ary[a]+m)); 
	cout<<mx<<endl;
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
