#include <bits/stdc++.h>
using namespace std;

void f()
{
	int x;
	cin>>x;
	int arr[x];
	int m=INT_MAX;
	for(int a=0;a<x;a++)
	{
		cin>>arr[a];
		m=min(m,arr[a]);
	}
	int counter=0;
	for(int a=0;a<x;a++)
	{
		if(arr[a]==m)
		{
			counter++;
		}
	}
	int ans=x-counter;
	if(ans==1)
		cout<<"Marlon"<<endl;
	else
		cout<<"Nolram"<<endl;
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
