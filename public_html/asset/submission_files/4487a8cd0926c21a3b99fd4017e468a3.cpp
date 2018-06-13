#include <bits/stdc++.h>

using namespace std;

int n,m;
int arr[10][10];
bool ary[10][10];

int g(int x,int y,int b1,int b2)
{
	printf("Checking on: %d %d from %d %d = %d\n", x, y, b1, b2, arr[x][y]);
	for(int a=0;a<n;a++)
	{
		for(int b=0;b<m;b++)
			cout<<arr[a][b];
		cout<<endl;
	}
	cout<<endl;
	if(x==n || y==m || x<0 || y<0)
		return 0;
	/*else if(ary[b1][b2]==true && arr[x][y]!=0)
	{
		arr[b1][b2]=max(arr[x][y],arr[b1][b2]);
		arr[x][y]=arr[b1][b2];
	}*/
	else if(arr[x][y]==1)
	{
		g(x+1,y,x,y);
		g(x,y+1,x,y);
		g(x+1,y+1,x,y);
		//arr[b1][b2]+=arr[x][y];
		arr[x][y]+=max(arr[x+1][y],max(arr[x][y+1],arr[x+1][y+1]));
		ary[x][y]=true;
		ary[b1][b2]=true;
	}
}

void f()
{
	cin>>n>>m;
	for(int a=0;a<n;a++)
		for(int b=0;b<m;b++)
			cin>>arr[a][b];
	g(0,0,0,0);
	int mx=0;
	for (int a=0; a<n; a++)
    	mx=max(mx,*max_element(arr[a],arr[a]+m)); 
	printf("Checking on: 0 0 = %d\n", arr[0][0]);
	for(int a=0;a<n;a++)
	{
		for(int b=0;b<m;b++)
			cout<<arr[a][b];
		cout<<endl;
	}   
		cout<<endl;
	cout<<mx<<endl;
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
