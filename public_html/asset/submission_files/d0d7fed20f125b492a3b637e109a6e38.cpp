#include <bits/stdc++.h>

using namespace std;

void f()
{
	int ca,fus=0,ra=0,bus[100000];
	string s;
	char data[27];
	map <char,int> mp1;
	map <int,int> mp2;
	bool stat=false,aman=false;
	memset(bus,0,sizeof(bus));
	cin>>s;
	ca=s.length();
	for(int a=0;a<ca;a++)
	{
		mp1[s[a]]+=1;		
		if(data[fus]!=s[a])
		{
			fus+=1;
			data[fus] = s[a];
		}
	}
	int fuck[fus],arr[3];
	memset(arr,0,sizeof(arr));
	for(int a=1;a<=fus;a++)
	{
		fuck[a] = mp1[data[a]];
		mp2[fuck[a]]+=1;
		if(arr[ra]!=fuck[a]&&bus[fuck[a]]==0)
		{
			ra+=1;
			bus[fuck[a]]=1;
			arr[ra] = fuck[a];
			if(ra>2)
			{
				stat=false;
				aman=true;
				break;		
			}
		}
	}
	if(ra==1)
	{
		stat=true;	
		aman=true;	
	}
	int sinyal=0,temp;
	pair<int,int> axy[3];
	if(aman==false)
	{
		for(int a=1;a<=2;a++)
		{
			axy[a].first=arr[a];
			axy[a].second=mp2[arr[a]];
			if(axy[a].second==1)
			{
				sinyal=1;
				temp=a;
			}
		}
		if(sinyal==0)
			stat=false;
		else
		{
			if(temp==1)
			{
				if(axy[1].first > axy[2].first && axy[1].first - axy[2].first==1 || axy[1].first == 1)
					stat=true;	
				else
					stat=false;
			}			
			else
			{
				if(axy[2].first > axy[1].first && axy[2].first - axy[1].first==1 || axy[2].first == 1)
					stat=true; 
				else
					stat=false;
			}
		}
	}
	if(stat==true)
		cout<<"YES";
	else
		cout<<"NO";
	cout<<endl;
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
