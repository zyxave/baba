#include<bits/stdc++.h>
using namespace std;
int main()
{
	int n;
	cin>>n;
	int ar[n];
	int arr[n];
	for(int i=0;i<n;i++)
	{
		cin>>ar[i]>>arr[i];
	}
	int t;
	cin>>t;
	int m;
	for(int j=0;j<t;j++)
	{
		cin>>m;
		for(int k=0;k<n;k++)
		{
			if(m==ar[k])
			cout<<arr[k]<<endl;
		}
	}
}
