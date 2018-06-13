#include<bits/stdc++.h>
using namespace std;
int arr[10000]; bool x; 
int main()
{
	int n,k;
	cin>>n;
	for(int i=0;i<n;i++)
	{
		int nn;x=false;k=0;
		cin>>nn;
		for(int j=0;j<nn;j++)
		{
			cin>>arr[j];
			while(arr[j]>9)
			{
				k=k+arr[j]%10;
				arr[j]=arr[j]/10;
			}
			k=k+arr[j];
		}
		if(k%3==0)
		{cout<<"Yes\n";
		}
		else cout<<"No\n";
	}
}
