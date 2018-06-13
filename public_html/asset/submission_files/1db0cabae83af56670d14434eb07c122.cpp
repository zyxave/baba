#include<bits/stdc++.h>
using namespace std;

int t,n,size[1000001],arr[1000001];
string str[100001];

bool syarat(int x,int y)
{
	if(size[x]!=size[y]) return size[x]<size[y];
	if(str[x]!=str[y]) return str[x]<str[y];
}

int main ()
{
	cin>>t;
	while(t--)
	{
		cin>>n;
		for(int i=1;i<=n;i++)
		{
			cin>>str[i];
			size[i]=str[i].size();
			arr[i]=i;
		}
		sort(arr+1,arr+n+1,syarat);
	}
	for(int i=1;i<=n;i++)
	{
		cout<<str[arr[i]]<<endl;
	}
}
